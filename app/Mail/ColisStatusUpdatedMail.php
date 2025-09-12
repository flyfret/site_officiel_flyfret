<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ColisStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $numeroSuivi;
    public $lienSuivi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->numeroSuivi = $numeroSuivi;
        $this->lienSuivi = $lienSuivi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mise à jour de votre colis')
            ->view('emails.colis_status_updated')
            ->with([
                'numeroSuivi' => $this->numeroSuivi,
                'lienSuivi' => $this->lienSuivi,
        ]);
    }
}
