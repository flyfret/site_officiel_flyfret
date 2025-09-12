<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendez_vous extends Model
{
    use HasFactory;

    protected $table = 'rendez_vous';

    // Colonnes autorisées pour l'insertion
    protected $fillable = [
        'Nom', 'Prénom', 'Email', 'date', 'Motif du rendez-vous'
    ];
}
