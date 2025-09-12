<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ColisStatusNotification;

class EmailStatut extends Controller
{
    private function sendStatusEmailToClients(DetailsColis $colis, Client $expediteur, Client $destinataire)
    {
        try {
            // Email à l'expéditeur
            Mail::to($expediteur->Email_cli)->send(new ColisStatusNotification(
                $colis, 
                $expediteur, 
                'expediteur'
            ));
            
            Log::info('Email envoyé à l\'expéditeur: ' . $expediteur->Email_cli);
        } catch (\Exception $e) {
            Log::error('Erreur envoi email expéditeur: ' . $e->getMessage());
        }

        try {
            // Email au destinataire
            Mail::to($destinataire->Email_cli)->send(new ColisStatusNotification(
                $colis, 
                $destinataire, 
                'destinataire'
            ));
            
            Log::info('Email envoyé au destinataire: ' . $destinataire->Email_cli);
        } catch (\Exception $e) {
            Log::error('Erreur envoi email destinataire: ' . $e->getMessage());
        }
    }
}
