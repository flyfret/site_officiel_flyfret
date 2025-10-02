<?php

namespace App\Mail;

use App\Models\RendezVous;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendezVousNotificationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $rendezVous;

    public function __construct(RendezVous $rendezVous)
    {
        $this->rendezVous = $rendezVous;
    }

    public function build()
    {
        return $this->subject('Nouveau Rendez-vous FlyFret - ' . $this->rendezVous->prenom . ' ' . $this->rendezVous->nom)
                    ->view('mail.rendezvous-admin')
                    ->with([
                        'rendezVous' => $this->rendezVous,
                    ]);
    }
}