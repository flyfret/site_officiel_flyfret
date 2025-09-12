<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DetailsColis;

class Expedier extends Model
{
    protected $table = 'expedier';
    
    protected $fillable = [
        'num_col',
        // 'num_details_colis', 
        'type_expedition',
        'mode_expedition',
        'ville_expedition',
        'adresse_expediteur',
        'date_expedition',
        'num_cli',
       
    ];

    public function colis()
    {
        return $this->belongsTo(DetailsColis::class, 'num_col');
    }
}