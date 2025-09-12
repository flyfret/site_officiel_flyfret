<?php

namespace App\Http\Controllers;

use App\Models\DetailsColis;
use Illuminate\Http\Request;
use App\Models\RendezVous;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RendezVousConfirmation;
use App\Mail\RendezVousMail;
use Illuminate\Support\Facades\Log;

class RendezVousController extends Controller
{
    public function showForm(Request $request)
    {
        return view('rendezvous');
    }

    public function storeRendezVous(Request $request)
    {
        DB::beginTransaction();

        try {
            // Log des données reçues
            Log::info('Données reçues', ['data' => $request->all()]);

            // Convertir "non défini" en null pour le champ valeur
            $request->merge([
                'quantite' => $request->input('quantite') === 'non défini' ? 1 : $request->input('quantite'),
                'valeur' => $request->input('valeur') === 'non défini' ? null : $request->input('valeur'),
            ]);
            
            $validatedData = $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|email',
                'date' => 'required|date',
                'heure' => 'required|date_format:H:i',
                'motif' => 'required|string',
                'agence' => 'nullable|string',
                'autre_motif' => 'nullable|string',
            ]);

            Log::info('Données validées', ['data' => $validatedData]);

            // Vérifier si le créneau est déjà complet
            $existingAppointments = RendezVous::where('date', $validatedData['date'])
                ->where('heure', $validatedData['heure'])
                ->count();

            if ($existingAppointments >= 3) {
                DB::rollBack();
                return response()->json(['message' => 'Le créneau est déjà complet. Veuillez choisir un autre horaire.'], 400);
            }

            // Enregistre d'abord le rendez-vous
            $rendezVous = RendezVous::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'date' => $validatedData['date'],
                'heure' => $validatedData['heure'],
                'motif' => $validatedData['motif'],
                'agence' => $request->input('agence', null),
                'autre_motif' => $request->input('autre_motif', null),
            ]);

            try {
                Mail::to('kanousali.flyfret@gmail.com')->send(new RendezVousMail($rendezVous));
                
                DB::commit();

                Log::info('Rendez-vous enregistré et email envoyé', ['rendezVous' => $validatedData]);

                return response()->json([
                    'message' => 'Rendez-vous enregistré avec succès! Le mail a été envoyé.',
                    'redirect' => true
                ]);
            } catch (\Exception $e) {
                DB::commit();
                Log::error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
                return response()->json([
                    'message' => 'Rendez-vous enregistré, mais une erreur est survenue lors de l\'envoi de l\'email.',
                    'error' => $e->getMessage(),
                    'redirect' => false
                ], 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log des erreurs de validation
            Log::error('Erreur de validation', ['errors' => $e->errors()]);

            return response()->json([
                'message' => 'Les données fournies sont invalides.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erreur lors de l\'enregistrement du rendez-vous: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur s\'est produite lors de l\'enregistrement du rendez-vous.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function liste()
    {
        $rendezvous = RendezVous::with('detailsColis')->paginate(2);
        return view('liste-rendezvous', compact('rendezvous'));
    }
}