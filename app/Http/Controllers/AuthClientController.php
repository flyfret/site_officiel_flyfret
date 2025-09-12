<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function create(Request $request)
    {   
        if (auth()->check()) {
            return redirect()->route('index1');
        }

        $previousUrl = $request->input('previous') ?? url()->previous();
        
        if (!str_contains($previousUrl, 'inscription')) {
            session(['url.intended' => $previousUrl]);
        }
        
        return view('inscription');
    }

    public function store(Request $request)
    {
        if (auth()->check()) {
            return redirect()->intended(route('index1'));
        }
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:clients,Email_cli',
            'password' => 'required|string|min:6',
        ],[
            'nom.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'telephone.required' => 'Le téléphone est requis',
            'email.required' => 'L\'email est requis',
            'email.unique' => 'Cet email est déjà utilisé',
        ]);

        $client = Client::create([
            'nom_cli' => $request->nom,
            'prenom_cli' => $request->prenom,
            'contact_cli' => $request->telephone,
            'Email_cli' => $request->email,
            'pwd_cli' => Hash::make($request->password),
        ]);

        Auth::login($client);
        $request->session()->regenerate();

        // Récupération des données du colis
        $colisData = [
            'mode_expedition' => $request->input('mode_expedition', ''),
            'ville_expedition' => $request->input('ville_expedition', ''),
            'ville_retrait' => $request->input('ville_retrait', ''),
            'prixTotal' => $request->input('prixTotal', 0),
            'prixExpress' => $request->input('prixExpress', 0),
            'type_colis' => $request->input('type_colis', ''),
            'type_expedition' => $request->input('type_expedition', $request->input('offre', 'standard')),
            'devise' => $request->input('devise', 'XOF')
        ];

        session(['colisData' => $colisData]);

        return redirect()->intended(route('connexion.client.form'))
            ->with('success', 'Inscription réussie ! Vous êtes maintenant connecté.');
    }

    public function showLoginForm(Request $request)
    {
        if (!str_contains(url()->previous(), 'connexion')) {
            session(['url.intended' => url()->previous()]);
        }
        
        return view('connexion');
    }

    public function connexion(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $client = Client::where('Email_cli', $credentials['email'])->first();

        if (!$client || !Hash::check($credentials['password'], $client->pwd_cli)) {
            return back()->withErrors([
                'email' => 'Les identifiants fournis sont incorrects.',
            ])->withInput($request->only('email'));
        }

        Auth::login($client);
        $request->session()->regenerate();

        // Récupération des données du colis
        $colisData = [
            'mode_expedition' => $request->input('mode_expedition', ''),
            'ville_expedition' => $request->input('ville_expedition', ''),
            'ville_retrait' => $request->input('ville_retrait', ''),
            'prixTotal' => $request->input('prixTotal', 0),
            'prixExpress' => $request->input('prixExpress', 0),
            'type_colis' => $request->input('type_colis', ''),
            'type_expedition' => $request->input('type_expedition', 'standard'),
            'devise' => $request->input('devise', 'XOF')
        ];

        session(['colisData' => $colisData]);

        return redirect()->intended(route('index1'))
            ->with('success', 'Connexion réussie !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index1')
            ->with('success', 'Déconnexion réussie.');
    }
}