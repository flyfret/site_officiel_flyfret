<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediteur;
use App\Models\Retrait;

class ExpediteurController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:expediteurs,email',
            'ville' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
            // 'code_postal' => 'nullable|string|max:10',
            'date_envoi' => 'required|date',
        ]);

        Expediteur::create($request->all());

        return back()->with('success', 'Expéditeur enregistré avec succès !');
    }

    public function stores(Request $request)
    {
        $request->validate([
            'num_cli' => 'required|integer',
            'num_colis' => 'required|integer',
            'date_retrait' => 'required|date',
            'vill_retrait' => 'required|string|max:255',
            'Adress_retrait' => 'required|string|max:255',
            'code_post_retrait' => 'required|string|max:20',
        ]);

        Retrait::create($request->all());

        return back()->with('success', 'Retrait enregistré avec succès.');
    }

    //
}
