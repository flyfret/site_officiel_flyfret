<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $prenom;
    public $date;
    public $heure;

    /**
     * Crée une nouvelle instance du message.
     *
     * @param string $nom
     * @param string $prenom
     * @param string $date
     * @param string $heure
     */
    public function __construct($nom, $prenom, $date, $heure)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date = $date;
        $this->heure = $heure;
    }

    /**
     * Construit le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de Rendez-vous')
                    ->view('emails.rendezvous_confirmation')
                    ->cc(env('MAIL_ADMIN_ADDRESS')); // Envoie une copie à l'admin
    }
}
