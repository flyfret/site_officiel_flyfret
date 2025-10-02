<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RendezVousConfirmation;
use App\Mail\RendezVousNotificationAdmin;

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

            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email',
                'date' => 'required|date',
                'heure' => 'required|date_format:H:i',
                'motif' => 'required|string',
                'agence' => 'required|string',
                'autre_motif' => 'nullable|string|required_if:motif,Autres',
            ]);

            Log::info('Données validées', ['data' => $validatedData]);

            // Vérifier si le créneau est déjà complet
            $existingAppointments = RendezVous::where('date', $validatedData['date'])
                ->where('heure', $validatedData['heure'])
                ->count();

            if ($existingAppointments >= 3) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Le créneau est déjà complet. Veuillez choisir un autre horaire.'
                ], 400);
            }

            // Enregistrer le rendez-vous
            $rendezVous = RendezVous::create([
                'nom' => $validatedData['nom'],
                'prenom' => $validatedData['prenom'],
                'email' => $validatedData['email'],
                'date' => $validatedData['date'],
                'heure' => $validatedData['heure'],
                'motif' => $validatedData['motif'],
                'agence' => $validatedData['agence'],
                'autre_motif' => $validatedData['autre_motif'] ?? null,
            ]);

            // ENVOYER LES EMAILS AU CLIENT ET À L'ADMIN
            try {
                // Email de confirmation au CLIENT
                Mail::to($rendezVous->email)->send(new RendezVousConfirmation($rendezVous));
                
                // Email de notification à l'ADMIN
                $adminEmail = env('MAIL_FROM_ADDRESS', 'service.client@flyfret.net');
                Mail::to($adminEmail)->send(new RendezVousNotificationAdmin($rendezVous));
                
                DB::commit();

                Log::info('Rendez-vous enregistré et emails envoyés', [
                    'rendezVous_id' => $rendezVous->id,
                    'client_email' => $rendezVous->email,
                    'admin_email' => $adminEmail
                ]);

                return response()->json([
                    'message' => 'Rendez-vous enregistré avec succès! Un email de confirmation vous a été envoyé.',
                    'redirect' => true
                ]);

            } catch (\Exception $e) {
                DB::commit(); // On garde le rendez-vous même si l'email échoue
                
                Log::error('Erreur lors de l\'envoi des emails: ' . $e->getMessage());
                
                return response()->json([
                    'message' => 'Rendez-vous enregistré avec succès! Cependant, l\'email de confirmation n\'a pas pu être envoyé.',
                    'redirect' => true,
                    'email_error' => true
                ], 200);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
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
        $rendezvous = RendezVous::orderBy('created_at', 'desc')->paginate(10);
        return view('liste-rendezvous', compact('rendezvous'));
    }
}