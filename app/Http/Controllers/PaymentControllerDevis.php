<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CinetPay;
use App\Models\Client;
use App\Models\Destinataire;
use App\Models\Expediteur;
use App\Models\DetailsColis;
use App\Models\Expedier;
use App\Models\Retirer;
use App\Models\Facture;
use App\Models\Paiement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaiementReussiMail;

class PaymentControllerDevis extends Controller
{
    public function initPaiement(Request $request)
    {
        $validatedData = $request->validate([
            'nom_expediteur' => 'required|string|max:255',
            'prenom_expediteur' => 'required|string|max:255',
            'email_expediteur' => 'nullable|email|max:255',
            'contact_expediteur' => 'required|string|max:20',
            'adresse_expediteur' => 'required|string|max:255',
            'nom_destinataire' => 'required|string|max:255',
            'prenom_destinataire' => 'required|string|max:255',
            'email_destinataire' => 'nullable|email|max:255',
            'contact_destinataire' => 'required|string|max:20',
            'adresse_destinataire' => 'required|string|max:255',
            'mode_expedition' => 'required|string',
            'ville_expedition' => 'required|string',
            'ville_retrait' => 'required|string',
            'type_expedition' => 'required|string',
            'prixTotal' => 'required|numeric',
            'prixExpress' => 'nullable|numeric',
            'devise' => 'required|string|in:XOF,EUR',
            'type_colis' => 'required',
            'payment_method' => 'required|string|in:online,alternate',
        ]);

        if (in_array($validatedData['ville_expedition'], ['Paris', 'Lyon', 'Nancy'])) {
            $validatedData['prixTotal'] = $validatedData['prixTotal'] * 656;
        }

        $validatedData['amount'] = $validatedData['prixTotal'];
        $request->session()->put('expedition_data', $validatedData);

        return redirect()->route('cinetpay.paiement');
    }

    public function index(Request $request)
    {
        $expeditionData = $request->session()->get('expedition_data');
        if (!$expeditionData) {
            return redirect()->route('envoie')->withErrors(['message' => 'Données d\'expédition non trouvées.']);
        }

        // Générer un transaction_id unique
        $transaction_id = Str::uuid()->toString();
        $expeditionData['transaction_id'] = $transaction_id;

        $amountToPay = 100;

        // Stocker les données dans la session ET dans le cache
        $request->session()->put('current_transaction', $transaction_id);
        Cache::put('expedition_'.$transaction_id, $expeditionData, now()->addHours(2));

        $site_id = config('services.cinetpay.site_id');
        $api_key = config('services.cinetpay.apikey');

        if (empty($site_id) || empty($api_key)) {
            return back()->withErrors(['message' => 'CinetPay site_id ou apikey non configuré.']);
        }

        $cinetpay = new CinetPay($site_id, $api_key);

        $paymentData = [
            "transaction_id" => $transaction_id,
            "amount" => $amountToPay,
            "currency" => 'XOF',
            "customer_name" => $expeditionData['nom_expediteur'],
            "customer_surname" => $expeditionData['prenom_expediteur'],
            "channels" => "ALL",
            "description" => "Paiement pour l'expédition de colis",
            "notify_url" => route('payment.notify'),
            "return_url" => route('payment.return', ['transaction_id' => $transaction_id]),
            "metadata" => json_encode($expeditionData),
            "alternative_currency" => 'EUR',
            "invoice_data" => [],
            "customer_email" => $expeditionData['email_expediteur'],
            "customer_phone_number" => $expeditionData['contact_expediteur'],
            "customer_address" => $expeditionData['adresse_expediteur'],
            "customer_city" => $expeditionData['ville_expedition'],
            "customer_country" => $expeditionData['ville_expedition'] == 'Abidjan' ? 'CI' : 'FR',
            "customer_state" => $expeditionData['ville_expedition'] == 'Abidjan' ? 'CI' : 'FR',
            "customer_zip_code" => "00225"
        ];

        try {
            $result = $cinetpay->generatePaymentLink($paymentData);
            $paymentUrl = $result['data']['payment_url'];
            return redirect()->to($paymentUrl);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la génération du lien de paiement', [
                'error' => $e->getMessage(),
                'data' => $paymentData
            ]);
            return back()->withErrors(['message' => 'Erreur lors de la génération du lien de paiement. Veuillez réessayer.']);
        }
    }

    // j'ai modifié ici le 09/09/2025
    public function return(Request $request)
    {
        $transaction_id = $request->input('transaction_id') ?? $request->session()->get('current_transaction');

        if (!$transaction_id) {
            Log::error('Transaction ID manquant dans la requête de retour', $request->all());
            return redirect()->route('envoie')
                ->withErrors(['message' => 'Transaction ID manquant. Veuillez contacter le support.']);
        }

        // Vérifier d'abord dans la base de données
        $paiement = Paiement::where('transaction_id', $transaction_id)->first();

        if ($paiement) {
            // ✅ Stockage permanent en session
            session()->put('transaction_id', $transaction_id);
            session()->flash('message', 'Votre paiement a été validé et l\'expédition enregistrée avec succès !');

            return redirect()->route('payment.success');
        }

        // Récupérer les données depuis le cache ou la session
        $expeditionData = Cache::get('expedition_'.$transaction_id) ?? $request->session()->get('expedition_data');
        
        if ($expeditionData) {
            try {
                DB::transaction(function () use ($expeditionData, $transaction_id) {
                    $this->storeExpeditionData($expeditionData, $transaction_id, 'CinetPay');
                });
                
                Cache::forget('expedition_'.$transaction_id);
                $request->session()->forget(['expedition_data', 'current_transaction']);

                session()->put('transaction_id', $transaction_id);
                session()->flash('message', 'Votre paiement a été validé et l\'expédition enregistrée avec succès !');

                return redirect()->route('payment.success');
            } catch (\Exception $e) {
                Log::error('Erreur lors de l\'enregistrement des données', [
                    'transaction_id' => $transaction_id,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);

                session()->put('transaction_id', $transaction_id);
                session()->flash('message', 'Votre paiement a été validé ! L\'expédition sera enregistrée sous peu.');

                return redirect()->route('payment.success');
            }
        }

        // Si aucune donnée trouvée
        session()->put('transaction_id', $transaction_id);
        session()->flash('message', 'Votre paiement a été validé avec succès !');

        return redirect()->route('payment.success');
    }

    
    public function notify(Request $request)
    {
        Log::info('Notification reçue de CinetPay', $request->all());
        
        $transaction_id = $request->input('transaction_id') 
            ?? $request->input('cpm_trans_id')
            ?? $request->input('payment_token');
        
        if (!$transaction_id) {
            Log::error('Transaction ID manquant dans la notification', $request->all());
            return response()->json(['error' => 'Transaction ID manquant'], 400);
        }

        $status = strtoupper($request->input('status') 
            ?? $request->input('cpm_trans_status') 
            ?? $request->input('code') 
            ?? $request->input('transaction_status'));

        $successStatuses = ['ACCEPTED', '00', 'SUCCESS', 'SUCCES', 'OK', 'PAID'];

        if (in_array($status, $successStatuses)) {
            $expeditionData = Cache::get('expedition_'.$transaction_id);
            
            if ($expeditionData) {
                try {
                    DB::transaction(function () use ($expeditionData, $transaction_id) {
                        // Vérifier d'abord si le paiement n'existe pas déjà
                        $existingPayment = Paiement::where('transaction_id', $transaction_id)->first();
                        
                        if (!$existingPayment) {
                            $this->storeExpeditionData($expeditionData, $transaction_id, 'CinetPay');
                        }
                    });
                    
                    Cache::forget('expedition_'.$transaction_id);
                    Log::info('Transaction traitée avec succès via notification', ['transaction_id' => $transaction_id]);
                } catch (\Exception $e) {
                    Log::error('Erreur lors du traitement de la notification', [
                        'transaction_id' => $transaction_id,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                }
            } else {
                Log::warning('Données d\'expédition non trouvées dans le cache pour la notification', [
                    'transaction_id' => $transaction_id
                ]);
            }
        } else {
            Log::info('Notification reçue avec statut non réussi', [
                'transaction_id' => $transaction_id,
                'status' => $status
            ]);
        }

        return response()->json(['message' => 'Notification traitée'], 200);
    }

    public function success(Request $request)
    {
        $transaction_id = $request->session()->get('transaction_id');
        $paiement = $transaction_id ? Paiement::where('transaction_id', $transaction_id)->first() : null;
        
        return view('payment.success', [
            'message' => $request->session()->get('message', 'Paiement réussi'),
            'transaction_id' => $transaction_id,
            'paiement' => $paiement
        ]);
    }

    private function storeExpeditionData($data, $transaction_id, $mode_paiement)
    {
        DB::beginTransaction();

        try {
            // Décoder les données des colis
            $colisData = [];
            if (!empty($data['type_colis'])) {
                $decoded = is_array($data['type_colis']) ? $data['type_colis'] : json_decode($data['type_colis'], true);
                if (is_array($decoded)) {
                    $colisData = $decoded;
                }
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
                ['Email_cli' => $data['email_expediteur']],
                [
                    'nom_cli' => $data['nom_expediteur'],
                    'prenom_cli' => $data['prenom_expediteur'],
                    'contact_cli' => $data['contact_expediteur'],
                    'pwd_cli' => Hash::make(Str::random(10)),
                    'Id_admin' => Auth::id() ?? 1,
                    'adresse' => $data['adresse_expediteur']
                ]
            );

            $expediteur = Expediteur::updateOrCreate(
                ['num_cli' => $clientExpediteur->num_cli],
                [
                    'nom_expediteur' => $data['nom_expediteur'],
                    'prenom_expediteur' => $data['prenom_expediteur'],
                    'contact_expediteur' => $data['contact_expediteur'],
                    'email_expediteur' => $data['email_expediteur'],
                ]
            );

            // 2. Gestion du destinataire
            $clientDestinataire = Client::updateOrCreate(
                ['Email_cli' => $data['email_destinataire']],
                [
                    'nom_cli' => $data['nom_destinataire'],
                    'prenom_cli' => $data['prenom_destinataire'],
                    'contact_cli' => $data['contact_destinataire'],
                    'pwd_cli' => Hash::make(Str::random(10)),
                    'Id_admin' => Auth::id() ?? 1,
                    'adresse' => $data['adresse_destinataire']
                ]
            );

            $destinataire = Destinataire::updateOrCreate(
                ['num_cli' => $clientDestinataire->num_cli],
                [
                    'nom_destinataire' => $data['nom_destinataire'],
                    'prenom_destinataire' => $data['prenom_destinataire'],
                    'contact_destinataire' => $data['contact_destinataire'],
                    'email_destinataire' => $data['email_destinataire'],
                    'expediteur_id' => $expediteur->id
                ]
            );

            // Génération du numéro de suivi
            $villeDepart = strtoupper(substr($data['ville_expedition'], 0, 1));
            $villeArrivee = strtoupper(substr($data['ville_retrait'], 0, 1));
            $serieChiffres = str_pad(DetailsColis::max('num_col') + 1, 5, '0', STR_PAD_LEFT);
            $nomExpediteur = strtoupper(preg_replace('/\s+/', '', $data['nom_expediteur']));
            $numeroSuivi = $villeDepart . '-' . $villeArrivee . '-' . $serieChiffres . '-' . $nomExpediteur;
            
            // Création du colis
            $detailsColis = DetailsColis::create([
                
                'num_details_colis' => $numeroSuivi,
                'type_colis' => $typeColisFinal,
                'quantite' => $quantiteTotale,
                'valeur_marchande' => $valeurTotale,
                'status' => 'en attente',
                'expediteur_id' => $expediteur->id,
                'destinataire_id' => $destinataire->id,
                
            ]);

            // Envoi d'email de confirmation
            Mail::to($clientExpediteur->Email_cli)->send(new PaiementReussiMail($numeroSuivi));

            // Enregistrement expedition - CORRECTION ICI
            $expedition = Expedier::create([
                'num_col' => $detailsColis->num_col, // <-- OBLIGATOIRE
                'num_details_colis' => $detailsColis->num_details_colis,
                'type_expedition' => $data['type_expedition'],
                'mode_expedition' => $data['mode_expedition'],
                'ville_expedition' => $data['ville_expedition'],
                'adresse_expediteur' => $data['adresse_expediteur'],
                'date_expedition' => now(),
                'num_cli' => $clientExpediteur->num_cli,
                
            ]);

            // Enregistrement retrait
            $retrait = Retirer::create([
                'num_col' => $detailsColis->num_col, // ✅ OBLIGATOIRE - Même clé primaire
                'ville_retrait' => $data['ville_retrait'],
                'adresse_retrait' => $data['adresse_destinataire'],
                'date_retrait' => now(),
                'num_cli' => $clientDestinataire->num_cli,
            ]);

            // Enregistrement de la facture
            $facture = Facture::create([
                'libelle_fact' => 'Facture temporaire',
                'montant_tot_fact' => $data['prixTotal'],
                'tva_fact' => 0.2,
                'statut_fact' => 'Payée',
                'num_cli' => $clientExpediteur->num_cli,
                'num_details_colis' => $detailsColis->num_details_colis,
                'payment_method' => $data['payment_method'] ?? 'online',
            ]);

            // Mise à jour du libellé avec le numéro de facture
            $facture->update([
                'libelle_fact' => 'Flyfret_Facture N°' . $facture->num_fact,
            ]);

            // Enregistrement du paiement
            Paiement::create([
                'Date_paiement' => now(),
                'Montant' => $data['prixTotal'],
                'mode_paiement' => $mode_paiement,
                'num_fact' => $facture->num_fact,
                'transaction_id' => $transaction_id
            ]);

            DB::commit();

            Log::info('Enregistrement de l\'expédition réussi', [
                'transaction_id' => $transaction_id,
                'client_expediteur' => $clientExpediteur->num_cli,
                'client_destinataire' => $clientDestinataire->num_cli
            ]);

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de l\'enregistrement de l\'expédition', [
                'transaction_id' => $transaction_id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $data
            ]);
            
            throw $e;
        }
    }
}