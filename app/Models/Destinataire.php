<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Expediteur;
use App\Models\DetailsColis;

class Destinataire extends Model
{
    use HasFactory;

    protected $table = 'destinataires';

    protected $fillable = [
        'num_cli',
        'expediteur_id', // Ajout de expediteur_id
        'nom_destinataire',
        'adresse_destinataire'
    ];

    // Relation avec Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'num_cli', 'num_cli');
    }

    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class);
    }

    public function detailsColis()
    {
        return $this->hasMany(DetailsColis::class);
    }
}
