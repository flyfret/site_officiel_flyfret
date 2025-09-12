<?php

namespace App\Http\Controllers;

use App\Models\DetailsColis;
use Illuminate\Http\Request;
use App\Models\GrilleDesPrix;
use App\Models\Colis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ColisController extends Controller
{
    public function index()
    {
        // Récupérer les types de colis depuis la base de données
        $typesColis = GrilleDesPrix::select('designation')
            ->distinct() // Éviter les doublons
            ->get();
        $client = Auth::user(); // Récupère l'utilisateur connecté ou null
        // Passer les types de colis à la vue
        return view('welcome', compact('typesColis', 'client'));
    }

    public function index12()
    {
        $client = auth()->user(); // Récupère l'utilisateur connecté ou null
        return view('index12', compact('client'));
    }
    
    public function calculate(Request $request)
    {
        $request->validate([
            'mode_transport' => 'required|in:aerien,maritime',
            'ville_depart' => 'required|string',
            'ville_destination' => 'required|string|different:ville_depart',
            'colis' => 'required|array',
            'colis.*.type' => 'required|string',
            'colis.*.quantite' => 'required|integer|min:1',
            'colis.*.valeur_marchande' => 'nullable|numeric|min:0', // Allow nullable values
        ]);

        try {
            $modeTransport = $request->mode_transport;
            $villeDepart = $request->ville_depart;
            $villeDestination = $request->ville_destination;
            $colisList = $request->colis;

            $totalPrice = 0;

            foreach ($colisList as $colis) {
                $typeColis = $colis['type'];
                $quantite = $colis['quantite'];
                $valeurMarchande = $colis['valeur_marchande'] ?? 0; // Default to 0 if not provided

                // Fetch the price from the database
                $price = GrilleDesPrix::where('origine', $villeDepart)
                    ->where('destination', $villeDestination)
                    ->where('designation', $typeColis)
                    ->first();

                if ($price) {
                    $totalPrice += $price->prix * $quantite;
                } else {
                    // Default price if no match is found
                    $totalPrice += 50 * $quantite; // 50€ per colis by default
                }
            }

            $prixExpress = $totalPrice + 2; // Express price = Standard price + 2

            return response()->json([
                'total_price' => $totalPrice,
                'prix_express' => $prixExpress,
                'offre' => 'standard'
            ]);
        } catch (\Exception $e) {
            Log::error('Erreur dans calculate: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors du calcul du prix'], 500);
        }
    }

    public function detailsDevis(Request $request)
    {
        $prixTotal = $request->query('prixTotal');
        $prixExpress = $prixTotal + 2; // Express price = Standard price + 2
        $client = Auth::user(); // Récupère l'utilisateur connecté ou null
        return view('details-devis', [
            'mode' => $request->query('mode'),
            'depart' => $request->query('depart'),
            'destination' => $request->query('destination'),
            'type' => $request->query('type'),
            'quantite' => $request->query('quantite'),
            'valeur' => $request->query('valeur'),
            'prixTotal' => $prixTotal,
            'prixExpress' => $prixExpress, // Ajout de la variable manquante
            'client' => $client
        ]);
    }

    public function authentification(Request $request)
    {
        // Si l'utilisateur est déjà connecté, on le redirige vers la page d'envoi
        if (Auth::check()) {
            $params = [
                'mode_expedition' => $request->query('mode_expedition', ''),
                'ville_expedition' => $request->query('ville_expedition', ''),
                'ville_retrait' => $request->query('ville_retrait', ''),
                'type_colis' => $request->query('type_colis', ''),
                'prixTotal' => $request->query('prixTotal', ''),
                'prixExpress' => $request->query('prixExpress', ''),
                'type_expedition' => $request->query('type_expedition', ''),
                'devise' => $request->query('devise', '')
            ];
            
            return redirect()->route('envoie', $params);
        }

        // Sinon, on affiche la page d'authentification
        $offre = $request->query('offre');
        return view('authentification', [
            'offre' => $offre,
            'client' => null
        ]);
    }

    public function storeColis(Request $request)
    {
        $request->validate([
            'mode_transport' => 'required|string',
            'ville_depart' => 'required|string',
            'ville_destination' => 'required|string',
            'type_colis' => 'required|string',
            'quantite' => 'required|integer',
            'valeur_marchande' => 'nullable|numeric',
            'offre_choisie' => 'required|string|in:standard,express',
        ]);

        DetailsColis::create([
            'mode_transport' => $request->mode_transport,
            'ville_depart' => $request->ville_depart,
            'ville_destination' => $request->ville_destination,
            'type_colis' => $request->type_colis,
            'quantite' => $request->quantite,
            'valeur_marchande' => $request->valeur_marchande,
            'offre_choisie' => $request->offre_choisie,
            'user_id' => Auth::id(), // Associer l'utilisateur connecté
        ]);

        return redirect()->route('rendezvous.form')->with('success', 'Colis enregistré avec succès.');
    }

    public function getTypesColis(Request $request)
    {
        try {
            // Validate incoming request
            $validated = $request->validate([
                'ville_depart' => 'required|string',
                'ville_destination' => 'required|string|different:ville_depart',
            ]);
    
            // Fetch colis types based on departure and destination cities
            $typesColis = GrilleDesPrix::select('categorie', 'designation', 'prix')
                ->where('origine', $validated['ville_depart'])
                ->where('destination', $validated['ville_destination'])
                ->orderBy('categorie')
                ->get()
                ->groupBy('categorie');
    
            return response()->json($typesColis);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in getTypesColis:', $e->errors());
            return response()->json(['error' => 'Invalid request parameters'], 422);
        } catch (\Exception $e) {
            Log::error('Erreur dans getTypesColis: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la récupération des types de colis'], 500);
        }
    }

    public function getPrixUnitaire(Request $request)
    {
        $request->validate([
            'ville_depart' => 'required|string',
            'ville_destination' => 'required|string',
            'type_colis' => 'required|string',
        ]);
    
        try {
            // Fetch the price based on the departure city, destination city, and colis type
            $prix = GrilleDesPrix::where('designation', $request->type_colis)
                ->where('origine', $request->ville_depart)
                ->where('destination', $request->ville_destination)
                ->value('prix');
    
            if ($prix !== null) {
                return response()->json(['prix_unitaire' => $prix]);
            }
    
            return response()->json([
                'error' => 'Prix non trouvé pour cette combinaison'
            ], 404);
    
        } catch (\Exception $e) {
            Log::error('Erreur dans getPrixUnitaire: ' . $e->getMessage());
            return response()->json([
                'error' => 'Erreur lors du calcul du prix'
            ], 500);
        }
    }

    public function suivi($numero_suivi)
    {
        $colis = \App\Models\DetailsColis::where('numero_suivi', $numero_suivi)->firstOrFail();
        return view('suivi_colis', compact('colis'));
    }

    public function lotTest()
    {
        return view('lotTest');
    }


    public function updateStatut(Request $request)
    {
        $request->validate([
            'nom_lot' => 'required|string',
            'status' => 'required|string',
        ]);

        DB::table('details_colis')
            ->where('nom_lot', $request->nom_lot)
            ->update(['status' => $request->status]);

        return redirect()->route('liste_lots')->with('success', 'Statut du lot mis à jour.');
    }

}