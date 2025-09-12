<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezVous;

    /**
     * Create a new message instance.
     */
    public function __construct($rendezVous)
    {
        $this->rendezVous = $rendezVous;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('mail.rendezvous_confirmation')
            ->from($this->rendezVous->email, $this->rendezVous->nom) // Utilise le nom de l'utilisateur et son email
            ->subject('Nouveau rendez-vous pris')
            ->with([
                'nom' => $this->rendezVous->nom,
                'prenom' => $this->rendezVous->prenom,
                'date' => $this->rendezVous->date,
                'heure' => $this->rendezVous->heure,
            ]);
    }
}
