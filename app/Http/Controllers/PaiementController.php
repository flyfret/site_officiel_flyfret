<?php

namespace App\Http\Controllers;



use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    // Méthode pour afficher le formulaire de paiement
    public function create()
    {
        // Retourner la vue 'paiement' (paiement.blade.php)
        return view('paiement');
    }

    // Méthode pour traiter la soumission du formulaire
    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $validatedData = $request->validate([
            'mode_paiement' => 'required|string', 
            'Montant' => 'required|numeric', 
            'num_fact' => 'required|integer', 
            'phone' => 'nullable|string', 
            'provider' => 'nullable|string', 
            'cardNumber' => 'nullable|string', 
            'expiry' => 'nullable|string', 
            'cvv' => 'nullable|string', 
        ]);
        
        // Enregistrement des données dans la base de données
        Paiement::create([
            'mode_paiement' => $validatedData['mode_paiement'],
            'Montant' => $validatedData['Montant'],
            'num_fact' => $validatedData['num_fact'],
            'phone' => $validatedData['phone'] ?? null,
            'provider' => $validatedData['provider'] ?? null,
            'cardNumber' => $validatedData['cardNumber'] ?? null,
            'expiry' => $validatedData['expiry'] ?? null,
            'cvv' => $validatedData['cvv'] ?? null,
        ]);

        // Après l'enregistrement, rediriger l'utilisateur et afficher un message de succès
        return redirect()->route('paiements.create')->with('success', 'Paiement enregistré avec succès !');
    }
}


