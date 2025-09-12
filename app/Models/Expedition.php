<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Retrait;

class Expedition extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'expeditions';

    // Colonnes que nous voulons mass-assigner
    protected $fillable = [
        'num_cli',
        'num_details_colis',
        'type_expedition',
        'mode_expedition',
        'ville_expedition',
        'code_post_expedition',
    ];

    // Relation avec Retrait
    public function retrait()
    {
        return $this->hasOne(Retrait::class, 'num_details_colis', 'num_details_colis');
    }
}
