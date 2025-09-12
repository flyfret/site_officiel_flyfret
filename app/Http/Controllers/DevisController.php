<?php

namespace App\Http\Controllers;

use App\Models\GrilleDesPrix;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        // Récupérer les types de colis depuis la base de données
        $typesColis = GrilleDesPrix::select('designation')
            ->distinct() // Éviter les doublons
            ->get();

        // Passer les types de colis à la vue
        return view('welcome', compact('typesColis'));
    }

}
