<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailsColis; 
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function index1(){
        $client = Auth::user();
        return view('index1', compact('client'));
    }
    public function contact(){
        $client = Auth::user();
        return view('contact', compact('client'));
    }
    public function apropos(){
        $client = Auth::user();
        return view('apropos', compact('client'));
    }
    public function blog(){
        $client = Auth::user();
        return view('blog', compact('client'));
    }

    public function suiviColis(Request $request)
    {
        // $colis = null;
        // $error = null;

        // if ($request->isMethod('post')) {
        //     $validated = $request->validate([
        //         'trackingNumber' => 'required|string|max:255',
        //         'trackingName' => 'required|string|max:255',
        //     ]);

        //     // Recherche par numéro de suivi OU nom de lot + nom expéditeur
        //     $colis = DetailsColis::where(function($query) use ($validated) {
        //             $query->where('num_details_colis', $validated['trackingNumber'])
        //                 ->orWhere('nom_lot', $validated['trackingNumber']);
        //         })
        //         ->whereHas('expediteur', function($query) use ($validated) {
        //             $query->where('nom_expediteur', 'like', '%'.$validated['trackingName'].'%');
        //         })
        //         ->with(['expediteur', 'destinataire', 'expedition', 'retrait'])
        //         ->first();

        //     if (!$colis) {
        //         $error = "Aucun colis trouvé avec le numéro/lot '".$validated['trackingNumber']."' et l'expéditeur '".$validated['trackingName']."'";
        //     }
        // }
        $client = Auth::user();

        return view('suivi', compact('client'));
    }

    public function header()
    {
      
        return view('partials.header');
    }
    public function conditionsGenerales()
    {
        $client = Auth::user();
        return view('conditiong', compact('client'));
    }
}
