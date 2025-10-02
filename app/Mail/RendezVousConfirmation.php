<?php

namespace App\Mail;

use App\Models\RendezVous;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezVous;
    public $detailsRendezVous;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RendezVous $rendezVous)
    {
        $this->rendezVous = $rendezVous;
        $this->detailsRendezVous = [
            'nom_complet' => $rendezVous->prenom . ' ' . $rendezVous->nom,
            'date' => $rendezVous->date,
            'heure' => $rendezVous->heure,
            'motif' => $rendezVous->motif,
            'agence' => $rendezVous->agence,
            'autre_motif' => $rendezVous->autre_motif,
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation de votre rendez-vous FlyFret')
                    ->view('mail.rendezvous-confirmation')
                    ->with([
                        'details' => $this->detailsRendezVous,
                    ]);
    }
}