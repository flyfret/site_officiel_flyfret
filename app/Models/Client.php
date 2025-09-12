<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✔ Ajouté ici
use Illuminate\Notifications\Notifiable;
use App\Models\Expediteur;
use App\Models\Destinataire;
use App\Models\DetailsColis;
use App\Models\Expedition;
use App\Models\Retrait;
use App\Models\Facture;



class Client extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'clients';

    protected $primaryKey = 'num_cli';


    public function factures()
    {
        return $this->hasMany(Facture::class, 'num_cli');
    }
    // ];



    protected $fillable = ['nom_cli', 'prenom_cli', 'contact_cli', 'Email_cli','pwd_cli','Id_admin'];


    protected $hidden = ['pw'];

    protected $casts = [
        'pw' => 'hashed', // ✔ Utiliser le hachage natif de Laravel 10+
    ];
    
    public function expediteur()
    {
        return $this->hasOne(Expediteur::class, 'num_cli');
    }

    public function destinataire()
    {
        return $this->hasOne(Destinataire::class, 'num_cli');
    }
    public function expeditions()
    {
        return $this->hasMany(Expedition::class, 'num_cli');
    }
    public function retraits()
    {
        return $this->hasMany(Retrait::class, 'num_cli');
    }

        public function colisExpedies()
    {
        return $this->hasMany(DetailsColis::class, 'expediteur_id', 'num_cli');
    }

    public function colisRecus()
    {
        return $this->hasMany(DetailsColis::class, 'destinataire_id', 'num_cli');
    }

}
