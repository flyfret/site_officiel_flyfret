<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // Import du trait
use Illuminate\Support\Facades\Auth;
use App\Models\Logisticien;
use App\Models\Comptable;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
  
   
    public function showLoginForm()
{
    // Cette méthode retourne la vue de la page de connexion
    return view('connexion');
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $email = $request->input('email');
    $maxAttempts = 3; // Nombre maximum de tentatives
    $lockoutTime = 15; // Temps de blocage en minutes

    // Compter les tentatives
    $attempts = Cache::get('login_attempts_' . $email, 0);

    if ($attempts >= $maxAttempts) {
        return redirect()->back()->withErrors([
            'email' => 'Ce compte est bloqué. Veuillez contacter un administrateur.',
        ]);
    }

    // Vérifier les credentials pour administrateur, logisticien et comptable
    $credentials = $request->only('email', 'password');

    if ($admin = Administrateur::where('Email_admin', $credentials['email'])->first()) {
        if (Hash::check($credentials['password'], $admin->password_admin)) {
            Auth::guard('admin')->login($admin);
            Cache::forget('login_attempts_' . $email); // Réinitialiser les tentatives
            return redirect()->route('index');
        }
    }

    if ($logisticien = Logisticien::where('Email_logist', $credentials['email'])->first()) {
        if (Hash::check($credentials['password'], $logisticien->password_logist)) {
            Auth::guard('logisticien')->login($logisticien);
            Cache::forget('login_attempts_' . $email); // Réinitialiser les tentatives
            return redirect()->route('show');
        }
    }

    if ($comptable = Comptable::where('Email_compta', $credentials['email'])->first()) {
        if (Hash::check($credentials['password'], $comptable->Password_compta)) {
            Auth::guard('comptable')->login($comptable);
            Cache::forget('login_attempts_' . $email); // Réinitialiser les tentatives
            return redirect()->route('comptable');
        }
    }

    // Échec de connexion
    Cache::increment('login_attempts_' . $email); // Incrémenter les tentatives
    Cache::put('account_blocked_' . $email, true, now()->addMinutes($lockoutTime)); // Bloquer le compte temporairement

    return redirect()->back()->withErrors([
        'email' => 'Identifiants incorrects. Vous avez encore ' . ($maxAttempts - $attempts - 1) . ' tentatives avant blocage.',
    ]);
}



public function resetAttempts(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'nullable|min:6', // Validation du mot de passe (optionnel)
    ]);

    $email = $request->input('email');
    $newPassword = $request->input('password'); // Récupérer le nouveau mot de passe

    // Vérifier si l'utilisateur est bloqué
    $isBlocked = Cache::get('account_blocked_' . $email, false);

    // Si l'utilisateur est bloqué, ajouter un message à la session
    if ($isBlocked) {
        session(['isBlocked' => true, 'blockedEmail' => $email]);
    } else {
        session()->forget('isBlocked');
    }

    // Si l'utilisateur n'est pas bloqué, afficher une erreur
    if (!$isBlocked) {
        return redirect()->back()->withErrors([
            'email' => 'Aucune tentative de connexion bloquée pour cet utilisateur.',
        ]);
    }

    // Vérifier si l'utilisateur est un logisticien ou un comptable
    $logisticien = Logisticien::where('Email_logist', $email)->first();
    $comptable = Comptable::where('Email_compta', $email)->first();

    // Réinitialiser les tentatives et débloquer l'utilisateur
    if ($logisticien || $comptable) {
        // Supprimer le cache des tentatives et du blocage
        Cache::forget('login_attempts_' . $email); // Réinitialiser les tentatives
        Cache::forget('account_blocked_' . $email); // Débloquer l'utilisateur

        // Si un mot de passe est fourni, le mettre à jour
        if ($newPassword) {
            // On met à jour le mot de passe uniquement si un mot de passe est fourni
            if ($logisticien) {
                $logisticien->password_logist = bcrypt($newPassword);
                $logisticien->save();
            } elseif ($comptable) {
                $comptable->Password_compta= bcrypt($newPassword);
                $comptable->save();
            }
        }

        // Afficher un message de succès
        return redirect()->back()->with('success', 'Les tentatives ont été réinitialisées et le compte a été débloqué.');
    }

    // Si ce n'est pas un logisticien ou un comptable
    return redirect()->back()->withErrors([
        'email' => 'Cet utilisateur ne peut pas être réinitialisé.',
    ]);
}


public function contactAdmin(Request $request)
{
    $email = $request->query('email');

    if (!$email) {
        return redirect()->back()->withErrors(['email' => 'Aucun email utilisateur fourni.']);
    }

    // Informations de l'administrateur (tu peux les extraire d'une table si nécessaire)
    $adminEmail = 'admin@example.com';

    // Envoi d'un email à l'administrateur
    Mail::to($adminEmail)->send(new \App\Mail\ContactAdminMail($email));

    return redirect()->back()->with('success', 'L\'administrateur a été contacté avec succès.');
}


}