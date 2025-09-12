<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    //
        public function parametres()
    {
        $client = auth()->user();
        
        if(!$client){
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté');
        }
        
        return view('dashboard.parametre', [
            'client' => $client
        ]);
        
    }
    public function update(Request $request)
    {
        $client = Auth::user();

        $request->validate([
            'nom_cli' => 'required|string|max:255',
            'prenom_cli' => 'required|string|max:255',
            'Email_cli' => 'required|email|max:255',
            'contact_cli' => 'required|string|max:255',
            'adresse_expediteur' => 'nullable|string|max:255',
        ]);

        $client->update([
            'nom_cli' => $request->nom_cli,
            'prenom_cli' => $request->prenom_cli,
            'Email_cli' => $request->Email_cli,
            'contact_cli' => $request->contact_cli,
        ]);

        // Si l'adresse est dans la table expediteurs
        if ($client->expediteur) {
            $client->expediteur->update([
                'adresse_expediteur' => $request->adresse_expediteur,
            ]);
        }

        return redirect()->route('dashboard.parametres')->with('success', 'Informations mises à jour.');
    }
}
