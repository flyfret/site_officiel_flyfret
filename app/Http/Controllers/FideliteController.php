<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailsColis;

class FideliteController extends Controller
{
    public function ProgrammeFidelite()
    {
        $client = auth()->user();


        if (!$client) {
            return redirect()->route('connexion.form')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Nombre de colis déposés par le client (expediteur)
        $colisCount = DetailsColis::where('expediteur_id', $client->num_cli)->count();
        // Définir le niveau et les points
       if ($colisCount >= 30) {
            $niveau = 'Or';
            $points = 30;
            $next = null;
        } elseif ($colisCount >= 20) {
            $niveau = 'Argent';
            $points = 20;
            $next = 30 - $colisCount;
        } elseif ($colisCount >= 10) {
            $niveau = 'Bronze';
            $points = 10;
            $next = 20 - $colisCount;
        } else {
            $niveau = 'Débutant';
            $points = $colisCount;
            $next = 10 - $colisCount;
        }

        // Pourcentage pour la barre de progression (max 30 pts)
        $progress = min(100, round($points / 30) * 100);

        return view('dashboard.fidelite', compact('client', 'colisCount', 'niveau', 'points', 'progress', 'next'));
    }
}
