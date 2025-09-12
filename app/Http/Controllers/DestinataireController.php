<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinataire;
use App\Models\Expediteur;

class DestinataireController extends Controller
{
    public function storeEnvoi(Request $request)
    {
        // Validation des données
        $request->validate([
            'expediteur_nom' => 'required',
            'expediteur_prenom' => 'required',
            'expediteur_email' => 'nullable|email',
            'expediteur_ville' => 'nullable|string|max:255',
            'expediteur_adresse' => 'nullable|string|max:255',
            'expediteur_contact' => 'nullable|numeric',
            'expediteur_code_postal' => 'nullable|string|max:10',
            'expediteur_date_envoi' => 'nullable|date',
            
            'destinataire_nom' => 'required',
            'destinataire_prenom' => 'required',
            'destinataire_email' => 'nullable|email',
            'destinataire_ville' => 'nullable|string|max:255',
            'destinataire_adresse' => 'nullable|string|max:255',
            'destinataire_contact' => 'nullable|numeric',
            'destinataire_code_postal' => 'nullable|string|max:10',
            'destinataire_date_reception' => 'nullable|date',
        ]);
        
    
        return redirect()->route('envoi.index')->with('success', 'Envoi enregistré avec succès!');
    }
}


