<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Destinataire;
use App\Models\Expediteur;
use App\Models\DetailsColis; 
use Illuminate\Http\Request;
use App\Models\Expedier;
use App\Models\Retirer;
use App\Models\Facture;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ColisStatusNotification;




class InscriptionController extends Controller
{


    public function store(Request $request)
    {
        // Valider les données de base
        $validated = $request->validate([
            'nom_expediteur' => 'required|string|max:255',
            'prenom_expediteur' => 'required|string|max:255',
            'email_expediteur' => 'required|email|max:255',
            'contact_expediteur' => 'required|string|max:20',
            'adresse_expediteur' => 'required|string|max:255',

            'nom_destinataire' => 'required|string|max:255',
            'prenom_destinataire' => 'required|string|max:255',
            'email_destinataire' => 'required|email|max:255',
            'contact_destinataire' => 'required|string|max:20',
            'adresse_destinataire' => 'required|string|max:255',

            'mode_expedition' => 'required|string|in:aerien,maritime',
            'ville_retrait' => 'required|string',
            'ville_expedition' => 'required|string',
            'prixTotal' => 'required|numeric|min:0',
            'prixExpress' => 'required|numeric|min:0',
            'type_expedition' => 'required|string|in:standard,express',
            'type_colis' => 'required',
            'payment_method' => 'required|string|in:online,alternate',
        ]);

        DB::beginTransaction();

        try {
            // Décoder les données des colis
            $colisData = json_decode($request->input('type_colis'), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("Invalid JSON data for colis");
            }

            // Préparer les données pour l'enregistrement
            $typesColis = [];
            $quantiteTotale = 0;
            $valeurTotale = 0;

            foreach ($colisData as $colis) {
                $typesColis[] = $colis['type'] ?? 'Non spécifié';
                $quantiteTotale += $colis['quantite'] ?? 0;
                $valeurTotale += $colis['valeur_marchande'] ?? 0;
            }
            
            $typeColisFinal = implode(', ', array_unique($typesColis));
            
            // 1. Gestion de l'expéditeur
            $clientExpediteur = Client::updateOrCreate(
                ['Email_cli' => $validated['email_expediteur']],
                [
                    'nom_cli' => $validated['nom_expediteur'],
                    'prenom_cli' => $validated['prenom_expediteur'],
                    'contact_cli' => $validated['contact_expediteur'],
                    'adresse' => $validated['adresse_expediteur'],
                    'pwd_cli' => Hash::make(Str::random(10)),
                    'Id_admin' => Auth::id() ?? 1, 
                ]
            );

            $expediteur = Expediteur::firstOrCreate(
                ['num_cli' => $clientExpediteur->num_cli],
                ['nom_expediteur' => $validated['nom_expediteur']]
            );

            // 2. Gestion du destinataire
            $clientDestinataire = Client::updateOrCreate(
                ['Email_cli' => $validated['email_destinataire']],
                [
                    'nom_cli' => $validated['nom_destinataire'],
                    'prenom_cli' => $validated['prenom_destinataire'],
                    'contact_cli' => $validated['contact_destinataire'],
                    'adresse' => $validated['adresse_destinataire'],
                    'pwd_cli' => Hash::make(Str::random(10)),
                    'Id_admin' => Auth::id() ?? 1,
                ]
            );

            $destinataire = Destinataire::firstOrCreate(
                ['num_cli' => $clientDestinataire->num_cli],
                [
                    'nom_destinataire' => $validated['nom_destinataire'],
                    'expediteur_id' => $expediteur->num_cli
                ]
            );

            // Génération du numéro de suivi
            $num_details_colis = DetailsColis::generateTrackingNumber(
                $validated['ville_expedition'],
                $validated['ville_retrait']
            );

            // Création du colis
            $detailsColis = DetailsColis::create([
                'num_details_colis' => $num_details_colis,
                'type_colis' => $typeColisFinal,
                'quantite' => $quantiteTotale,
                'valeur_marchande' => $valeurTotale,
                'status' => 'En attente',
                'expediteur_id' => $expediteur->id,
                'destinataire_id' => $destinataire->id,
            ]);

            // Enregistrement expedition
            $expedition = Expedier::create([
                // 'num_details_colis' => $detailsColis->num_details_colis,
                'num_col' => $detailsColis->num_col,
                'type_expedition' => $validated['type_expedition'],
                'mode_expedition' => $validated['mode_expedition'],
                'ville_expedition' => $validated['ville_expedition'],
                'adresse_expediteur' => $validated['adresse_expediteur'],
                'date_expedition' => now(),
                'num_cli' => $clientExpediteur->num_cli,
                'expediteur_id' => $expediteur->id,
            ]);

            // Enregistrement retrait
            $retrait = Retirer::create([
                // 'num_details_colis' => $detailsColis->num_details_colis,
                'num_col' => $detailsColis->num_col,
                'ville_retrait' => $validated['ville_retrait'],
                'adresse_retrait' => $validated['adresse_destinataire'],
                'date_retrait' => now(),
                'num_cli' => $clientDestinataire->num_cli,
                'destinataire_id' => $destinataire->id,
            ]);

            // Enregistrement de la facture
            $facture = Facture::create([
                'libelle_fact' => 'Facture temporaire',
                'montant_tot_fact' => $validated['prixTotal'],
                'tva_fact' => 0.2,
                'statut_fact' => $validated['payment_method'] === 'online' ? 'En attente' : 'A payer',
                'num_cli' => $clientExpediteur->num_cli,
                'num_col' => $detailsColis->num_col,
                'payment_method' => $validated['payment_method'],
            ]);

            // Mise à jour du libellé avec le numéro de facture
            $facture->update([
                'libelle_fact' => 'Flyfret_Facture N°' . $facture->num_fact,
            ]);

            // ENVOI DES EMAILS AUX CLIENTS
            $this->sendStatusEmailToClients($detailsColis, $clientExpediteur, $clientDestinataire);

            DB::commit();

            Log::info('Enregistrement réussi', [
                'tracking_number' => $num_details_colis,
                'client_expediteur' => $clientExpediteur->num_cli,
                'client_destinataire' => $clientDestinataire->num_cli
            ]);

            // Redirection différente selon la méthode de paiement
            if ($validated['payment_method'] === 'online') {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('envoie.paiement'),
                    'tracking_number' => $num_details_colis
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'redirect_url' => route('paiement.message'),
                    'tracking_number' => $num_details_colis
                ]);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'enregistrement', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'enregistrement: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function showLoginForm()
    {
       
        return view('connexion');
    }

    // public function connexion(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $client = Client::where('Email_cli', $request->email)->first();

    //     if ($client && Hash::check($request->password, $client->pwd_cli)) {
    //         session(['client' => $client]);

    //         return redirect()->route('tableauxBordClient')->with('success', 'Connexion réussie !');
    //     }

    //     return back()->withErrors(['email' => 'Identifiants incorrects.']);
    // }

    public function profil()
    {
        $client = auth()->user();
        
        if(!$client){
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Vérifier si le client est connecté
        
        return view('dashboard.profile', compact('client'));
    }

    public function logout()
    {
        //deconnexion de l'utilisateur
        auth::logout();
        return redirect()->route('connexion.form')->with('success', 'Déconnexion réussie.');
    }
   
    public function updateProfile(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $client = session('client');
        if (!$client) {
            return redirect()->route('connexion.form')->withErrors(['message' => 'Vous devez être connecté pour mettre à jour votre profil.']);
        }

        // Mise à jour du profil
        $client->nom_cli = $request->nom;
        $client->prenom_cli = $request->prenom;
        $client->contact_cli = $request->telephone;
        $client->Email_cli = $request->email;

        if ($request->password) {
            $client->pwd_cli = Hash::make($request->password);
        }
       
        $client->save();

        // Mettre à jour la session avec les nouvelles données
        session(['client' => $client]);

        return redirect()->route('profil')->with('success', 'Profil mis à jour avec succès.');
    }

    // Envoi des emails de statut aux clients

        private function sendStatusEmailToClients(DetailsColis $colis, Client $expediteur, Client $destinataire)
    {
        try {
            // Email à l'expéditeur
            Mail::to($expediteur->Email_cli)->send(new ColisStatusNotification(
                $colis, 
                $expediteur, 
                'expediteur'
            ));
            
            Log::info('Email envoyé à l\'expéditeur: ' . $expediteur->Email_cli);
        } catch (\Exception $e) {
            Log::error('Erreur envoi email expéditeur: ' . $e->getMessage());
        }

        try {
            // Email au destinataire
            Mail::to($destinataire->Email_cli)->send(new ColisStatusNotification(
                $colis, 
                $destinataire, 
                'destinataire'
            ));
            
            Log::info('Email envoyé au destinataire: ' . $destinataire->Email_cli);
        } catch (\Exception $e) {
            Log::error('Erreur envoi email destinataire: ' . $e->getMessage());
        }
    }
}
