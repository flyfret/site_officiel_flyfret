<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrateur;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date_paiement',
        'Montant',
        'Devise',
        'Montant_XOF',
        'mode_paiement',
        'num_fact',
        'transaction_id'
    ];
    
    protected $primaryKey = 'num_paiement';
}

