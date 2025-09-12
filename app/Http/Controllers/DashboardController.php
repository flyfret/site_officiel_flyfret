<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use App\Models\Logisticien;
use App\Models\Comptable;
use App\Models\Colis;
use App\Models\DetailsColis;
use App\Models\Retrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Expediteur;
use App\Models\Client;

class DashboardController extends Controller
{
    public function Historique_envois()
    {
        if (!Auth::check()) {
            return redirect()->route('connexion.form')
                   ->with('error', 'Veuillez vous connecter');
        }

        $envois = Colis::where('id_client', Auth::id())->get();
        
        return view('Historique_envois', compact('envois'));
    }

    public function profilClient() {
        return view('dashboard-client');
    }

    public function comptable(){
        return view('comptable');
    }

    public function suivi()
    {
        if (!Auth::check()) {
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté pour accéder au suivi de colis.');
        }
        return view('suivi');
    }

public function suiviStore(Request $request)
{
    $request->validate([
        'trackingNumber' => 'required|string|max:50',
        'trackingName' => 'required|string|max:100'
    ]);

    // Chercher le colis avec les relations nécessaires
    $colis = DetailsColis::with([
            'expediteur.client', 
            'destinataire.client',
            'expedition', 
            'retrait',
        ])
        ->where('num_details_colis', $request->trackingNumber)
        ->first();
       
    if (!$colis) {
        return back()
            ->withInput()
            ->with('error', 'Numéro de suivi non trouvé. Veuillez vérifier et réessayer.');
    }

    // Vérification du nom dans expéditeur ou destinataire
    $nomTrouve = false;
    $nomRecherche = strtolower(trim($request->trackingName));

    // Vérification côté expéditeur
    if ($colis->expediteur) {
        // Vérifie d'abord le nom_expediteur
        $nomExpediteur = strtolower(trim($colis->expediteur->nom_expediteur ?? ''));
        if (!empty($nomExpediteur) && str_contains($nomExpediteur, $nomRecherche)) {
            $nomTrouve = true;
        }
        // Si non trouvé, vérifie le nom du client associé
        elseif ($colis->expediteur->client) {
            $nomClientExpediteur = strtolower(trim($colis->expediteur->client->nom_cli ?? ''));
            if (!empty($nomClientExpediteur) && str_contains($nomClientExpediteur, $nomRecherche)) {
                $nomTrouve = true;
            }
        }
    }

    // Vérification côté destinataire
    if (!$nomTrouve && $colis->destinataire) {
        // Vérifie d'abord le nom_destinataire
        $nomDestinataire = strtolower(trim($colis->destinataire->nom_destinataire ?? ''));
        if (!empty($nomDestinataire) && str_contains($nomDestinataire, $nomRecherche)) {
            $nomTrouve = true;
        }
        // Si non trouvé, vérifie le nom du client associé
        elseif ($colis->destinataire->client) {
            $nomClientDestinataire = strtolower(trim($colis->destinataire->client->nom_cli ?? ''));
            if (!empty($nomClientDestinataire) && str_contains($nomClientDestinataire, $nomRecherche)) {
                $nomTrouve = true;
            }
        }
    }

    if (!$nomTrouve) {
        return back()
            ->withInput()
            ->with('error', 'Le nom fourni ne correspond ni à l\'expéditeur ni au destinataire de ce colis.');
    }

    // Construction de la timeline
    $timeline = $this->buildTimeline($colis);

    return view('suivi', compact('colis', 'timeline'))
        ->with('success', 'Colis trouvé. Voici les détails de suivi.');
}

    private function buildTimeline($colis)
    {
        $timeline = [];
        
        // Événement: Colis créé
        $timeline[] = [
            'date' => $colis->created_at,
            'status' => 'Enregistré',
            'description' => 'Le colis a été enregistré dans notre système',
            'icon' => 'fas fa-box-open'
        ];

        // Événement: Expédié (si existe)
        // if ($colis->expedition) {
        //     $timeline[] = [
        //         'date' => $colis->expedition->date_expedition,
        //         'status' => 'Expédié',
        //         'description' => 'Le colis a été expédié vers sa destination',
        //         'icon' => 'fas fa-truck'
        //     ];
        // }

        // Événement: En transit (si entre expédition et retrait)
        // if ($colis->expedition && !$colis->retrait) {
        //     $timeline[] = [
        //         'date' => now(),
        //         'status' => 'En transit',
        //         'description' => 'Le colis est en cours de livraison',
        //         'icon' => 'fas fa-shipping-fast'
        //     ];
        // }

        // Événement: Livré (si existe)
        // if ($colis->retrait) {
        //     $timeline[] = [
        //         'date' => $colis->retrait->date_retrait,
        //         'status' => 'Livré',
        //         'description' => 'Le colis a été livré avec succès',
        //         'icon' => 'fas fa-check-circle'
        //     ];
        // }

        // Trier la timeline par date
        // usort($timeline, function($a, $b) {
        //     return $a['date'] <=> $b['date'];
        // });

        return $timeline;
    }

    public function envoie(Request $request)
    {
        $client = Auth::user();
        $colisData = $request->all();

        return view('envoie', [
            'client' => $client,
            'colisData' => $colisData,
        ]);
    }
    
    public function index()
    {
        $logisticiens = Logisticien::all();
        $comptables = Comptable::all();
        $administrateurs = Administrateur::all();
        
        return view('index', compact('logisticiens', 'comptables', 'administrateurs'));
    }

    public function show()
    {
        $nombre_colis = Colis::count();
        $nombre_retrait = Retrait::count();
    
        return view('logistique', compact('nombre_retrait', 'nombre_colis'));
    }
    
    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'type_user' => 'required|string|in:logisticien,comptable,administrateur',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'contact' => 'nullable|string',
            'Id_admin' => 'nullable|exists:administrateurs,Id_admin',
        ]);
    
        if (Logisticien::where('Email_logist', $validated['email'])->exists() || 
            Comptable::where('Email_compta', $validated['email'])->exists() || 
            Administrateur::where('Email_admin', $validated['email'])->exists()) {
            return redirect()->back()->withErrors('L\'email est déjà pris. Veuillez en choisir un autre.');
        }
    
        $Id_admin = $validated['Id_admin'] ?? 1;
    
        try {
            switch ($validated['type_user']) {
                case 'logisticien':
                    Logisticien::create([
                        'nom_logist' => $validated['nom'],
                        'prenom_logist' => $validated['prenom'],
                        'Email_logist' => $validated['email'],
                        'password_logist' => bcrypt($validated['password']),
                        'contact_logist' => $validated['contact'] ?? 'Non fourni',
                        'Id_admin' => $Id_admin,
                    ]);
                    break;
    
                case 'comptable':
                    Comptable::create([
                        'nom_compta' => $validated['nom'],
                        'prenom_compta' => $validated['prenom'],
                        'Email_compta' => $validated['email'],
                        'Password_compta' => bcrypt($validated['password']),
                        'contact_compta' => $validated['contact'] ?? 'Non fourni',
                        'Id_admin' => $Id_admin,
                    ]);
                    break;
    
                case 'administrateur':
                    Administrateur::create([
                        'Email_admin' => $validated['email'],
                        'password_admin' => bcrypt($validated['password']),
                    ]);
                    break;
    
                default:
                    return redirect()->back()->withErrors('Type d\'utilisateur invalide.');
            }
    
            return redirect()->route('index')->with('success', 'Utilisateur ajouté avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Erreur lors de l\'ajout de l\'utilisateur : ' . $e->getMessage());
        }
    }

    public function getUserInfo(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $logisticien = Logisticien::where('Email_logist', $email)->first();
        $comptable = Comptable::where('Email_compta', $email)->first();

        if ($logisticien) {
            return response()->json([
                'success' => true,
                'name' => $logisticien->Nom_logist,
                'role' => 'Logisticien',
            ]);
        }

        if ($comptable) {
            return response()->json([
                'success' => true,
                'name' => $comptable->Nom_compta,
                'role' => 'Comptable',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Aucun utilisateur trouvé avec cet email.',
        ]);
    }

    public function getColisData(Request $request)
    {
        return response()->json([
            'en_cours' => 12,
            'arrive' => 20,
            'disponible' => 8,
        ]);
    }

    public function historiqueColis()
    {
        $client = auth()->user();

        if (!$client) {
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté');
        }
        
        $expediteurIds = Expediteur::where('num_cli', $client->num_cli)->pluck('id');
 
        $colis = DetailsColis::whereIn('expediteur_id', $client)
            ->with(['destinataire'])
            ->orderByDesc('created_at')
            ->get();
        // dd($colis);
        return view('dashboard.historique_colis', [
            'client' => $client,
            'colis' => $colis
        ]);
    }

    public function getColisDetails($id)
    {
        $colis = DetailsColis::with(['expediteur', 'destinataire', 'expedition', 'retrait'])
            ->findOrFail($id);

        return view('dashboard.colis_details', compact('colis'));
    }
    
    public function historiquePaiements()
    {
        $client = auth()->user();

        if (!$client) {
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté');
        }

        return view('dashboard.historique_paiements', compact('client'));
    }
    public function message()
    {
        $client = auth()->user();
      
        return view('payment.message', compact('client'));
    }
}