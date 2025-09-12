<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailsColis;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Retirer extends Model
{
    protected $table = 'retirer';
    
    protected $fillable = [
        'num_col',
        'ville_retrait',
        'adresse_retrait',
        'date_retrait',
        'num_cli', // Ajoute ce champ
    ];

   public function detailsColis()
    {
        return $this->belongsTo(DetailsColis::class, 'num_col', 'num_col');
    }

    // Relation avec le client
    public function client()
    {
        return $this->belongsTo(Client::class, 'num_cli', 'num_cli');
    }
}