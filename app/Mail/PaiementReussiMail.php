<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaiementReussiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $numeroSuivi;
    public $lienSuivi;

    /**
     * Create a new message instance.
     */
    public function __construct($numeroSuivi)
    {
        $this->numeroSuivi = $numeroSuivi;
        $this->lienSuivi = url('/suivi/' . $numeroSuivi);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Votre paiement a été confirmé')
                    ->markdown('emails.paiement_reussi');
    }
}
