<?php

namespace App\Http\Controllers;

use App\Models\Destinataire;
use App\Models\Expediteur;
use Illuminate\Http\Request;
use App\Models\Expedition;
use App\Models\Retrait;

class ExpeditionController extends Controller
{
    // Afficher le formulaire
    public function create()
    {
        return view('expedition');
    }

    // Enregistrer les données dans la table expeditions
    public function storeExpeditionEtRetrait(Request $request)
    {
        // Validation des champs
        $validatedData = $request->validate([
            'code_post_expedition' => 'required|string',
            'date_expedition' => 'required|date',
            'ville_expedition' => 'required|string',
            'type_expedition' => 'required|string',
            'mode_expedition' => 'required|string',
            'adress_retrait' => 'required|string',
            // 'code_post_retrait' => 'required|string',
            'date_retrait' => 'required|date',
            'ville_retrait' => 'required|string',
        ]);

        // Enregistrement de l'expédition
        $expedition = Expedition::create([
            'num_cli' => $request->contact, // ou un autre identifiant unique
            'date_expedition' => $request->date_expedition,
            'type_expedition' => $request->type_expedition,
            'mode_expedition' => $request->mode_expedition,
            'ville_expedition' => $request->ville_expedition,
            'adress_expedition' => $request->adress_expedition,
            'code_post_expedition' => $request->code_post_expedition,
        ]);

        // Enregistrement du retrait
        Retrait::create([
            'num_cli' => $request->contact, // ou un autre identifiant unique
            'date_retrait' => $request->date_retrait,
            'ville_retrait' => $request->ville_retrait,
            'adress_retrait' => $request->adress_retrait,
            // 'code_post_retrait' => $request->code_post_retrait,
        ]);

        // Enregistrement du destinataire
        Destinataire::create([
            'num_cli' => $request->contact, // ou un autre identifiant unique
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        // Enregistrement de l'expéditeur
        Expediteur::create([
            'num_cli' => $request->contact, // ou un autre identifiant unique
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        // Redirection après l'enregistrement
        return redirect()->route('expedition.form')->with('success', 'Expédition et retrait enregistrés avec succès');
    }

    public function initierPaiement(Request $request)
    {
        // Récupérer et valider les données
        $expeditionData = $request->validate([
            'nom_expediteur' => 'required|string|max:255',
            'prenom_expediteur' => 'required|string|max:255',
            'email_expediteur' => 'nullable|email|max:255',
            'adresse_expediteur' => 'required|string|max:255',
            'contact_expediteur' => 'required|string|max:20',

            'nom_destinataire' => 'required|string|max:255',
            'prenom_destinataire' => 'required|string|max:255',
            'email_destinataire' => 'nullable|email|max:255',
            'adresse_destinataire' => 'required|string|max:255',
            'contact_destinataire' => 'required|string|max:20',

            'mode' => 'required|string',
            'depart' => 'required|string',
            'destination' => 'required|string',
            // 'codePostal' => 'required|string|max:10',
            'type' => 'required|string',
            'quantite' => 'required|integer|min:1',
            'valeur' => 'required|numeric|min:0',
            'prixTotal' => 'required|numeric|min:0',
            'prixExpress' => 'required|numeric|min:0',
            'offre' => 'required|in:standard,express',
        ]);

        // Calcul du montant
        $expeditionData['amount'] = $expeditionData['offre'] === 'express'
            ? $expeditionData['prixExpress']
            : $expeditionData['prixTotal'];

        // Stocker en session
        $request->session()->put('expedition_data', $expeditionData);

        // Retourner une vue avec un bouton pour lancer le paiement
        return view('paiement.confirmation', [
            'expeditionData' => $expeditionData,
            'amount' => $expeditionData['amount'] // Assurez-vous que ce champ existe
        ]);
    }
}
