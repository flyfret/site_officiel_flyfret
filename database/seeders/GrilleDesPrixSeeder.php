<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrilleDesPrixSeeder extends Seeder
{
    public function run()
    {
        DB::table('grille_des_prix')->insert([
            // Objets classiques (valeur < 100 €)
            ['categorie' => 'Objet classique', 'designation' => 'De 0 à 20 kg', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 12, 'unite' => '€/kg'],
            ['categorie' => 'Objet classique', 'designation' => 'De 0 à 20 kg', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 14, 'unite' => '€/kg'],
            ['categorie' => 'Objet classique', 'designation' => 'De 0 à 20 kg', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 14, 'unite' => '€/kg'],
            ['categorie' => 'Objet classique', 'designation' => 'Plus de 20 kg', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 11, 'unite' => '€/kg'],
            ['categorie' => 'Objet classique', 'designation' => 'Plus de 20 kg', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 13, 'unite' => '€/kg'],
            ['categorie' => 'Objet classique', 'designation' => 'Plus de 20 kg', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 13, 'unite' => '€/kg'],

            // Objets de valeur
            ['categorie' => 'Objet de valeur', 'designation' => 'Enveloppes', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 25, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Enveloppes', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 30, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Enveloppes', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 30, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Passeport', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 30, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Passeport', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 35, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Passeport', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 35, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone iPhone neuf', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 40, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone iPhone neuf', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 45, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone iPhone neuf', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 45, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone Android neuf', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 30, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone Android neuf', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 35, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Téléphone Android neuf', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 35, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Ordinateurs Apple', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 100, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Ordinateurs Apple', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 120, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Ordinateurs Apple', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 120, 'unite' => '€'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Diamant', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 60, 'unite' => '€/bijou'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Diamant', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 70, 'unite' => '€/bijou'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Diamant', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 70, 'unite' => '€/bijou'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 100 et 300€', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 17, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 100 et 300€', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 17, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 100 et 300€', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 17, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 300 et 600€', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 18, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 300 et 600€', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 20, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 300 et 600€', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 20, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 600 et 1000€', 'origine' => 'Paris', 'destination' => 'Abidjan', 'prix' => 23, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 600 et 1000€', 'origine' => 'Lyon', 'destination' => 'Abidjan', 'prix' => 25, 'unite' => '€/kg'],
            ['categorie' => 'Objet de valeur', 'designation' => 'Article entre 600 et 1000€', 'origine' => 'Nancy', 'destination' => 'Abidjan', 'prix' => 25, 'unite' => '€/kg'],
            
            // Colis divers
            ['categorie' => 'Colis divers', 'designation' => 'De 0 à 20 kg', 'origine' => 'Abidjan', 'destination' => 'Paris', 'prix' => 10, 'unite' => '€/kg'],
            ['categorie' => 'Colis divers', 'designation' => 'De 0 à 20 kg', 'origine' => 'Abidjan', 'destination' => 'Lyon', 'prix' => 12, 'unite' => '€/kg'],
            ['categorie' => 'Colis divers', 'designation' => 'De 0 à 20 kg', 'origine' => 'Abidjan', 'destination' => 'Nancy', 'prix' => 12, 'unite' => '€/kg'],

            // Colis spéciaux
            ['categorie' => 'Colis spéciaux', 'designation' => 'Enveloppe', 'origine' => 'Abidjan', 'destination' => 'Paris', 'prix' => 20, 'unite' => '€'],
            ['categorie' => 'Colis spéciaux', 'designation' => 'Colis périssable', 'origine' => 'Abidjan', 'destination' => 'Lyon', 'prix' => 2, 'unite' => '€/kg'],
            ['categorie' => 'Colis spéciaux', 'designation' => 'Colis périssable', 'origine' => 'Abidjan', 'destination' => 'Nancy', 'prix' => 2, 'unite' => '€/kg'],
        ]);
    }
}