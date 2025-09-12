<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrilleDesPrix extends Model
{
    use HasFactory;

    protected $table = 'grille_des_prix';

    /**
     * Récupère les désignations groupées par catégorie.
     */
    public static function getDesignationsByCategory()
    {
        return self::select('categorie', 'designation')
            ->distinct()
            ->orderBy('categorie')
            ->get()
            ->groupBy('categorie');
    }

    /**
     * Récupère les villes uniques (origine et destination).
     */
    public static function getVilles()
    {
        $origines = self::select('origine as ville')->distinct()->get();
        $destinations = self::select('destination as ville')->distinct()->get();

        // Fusionner les villes et supprimer les doublons
        $villes = $origines->merge($destinations)->unique('ville')->pluck('ville');

        // Ajouter d'autres villes si nécessaire
        $autresVilles = ['Marseille', 'Lille', 'Toulouse']; // Exemple de villes supplémentaires
        $villes = $villes->merge($autresVilles)->unique()->sort();

        return $villes;
    }

}