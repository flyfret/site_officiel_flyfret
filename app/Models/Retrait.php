<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedition;

class Retrait extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'retraits';

    // Colonnes que nous voulons mass-assigner
    protected $fillable = [
        'num_cli',
        'num_details_colis',
        'ville_retrait',
    ];

    // Relation avec Expedition
    public function expedition()
    {
        return $this->belongsTo(Expedition::class, 'num_details_colis', 'num_details_colis');
    }
}
