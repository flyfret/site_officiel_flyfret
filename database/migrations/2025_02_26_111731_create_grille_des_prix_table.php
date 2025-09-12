<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrilleDesPrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grille_des_prix', function (Blueprint $table) {
            $table->id();
            $table->string('categorie'); // Ex: "Objet classique", "Objet de valeur", "Colis divers"
            $table->string('designation'); // Ex: "Téléphone iPhone neuf", "Article entre 100 et 300€"
            $table->string('origine'); // Ex: "Paris", "Lyon", "Abidjan"
            $table->string('destination'); // Ex: "Abidjan", "Paris", "Lyon"
            $table->decimal('prix', 8, 2)->nullable(); // Prix (€ ou frs)
            $table->string('unite')->nullable(); // Ex: "€/kg", "€/bijou"
            $table->string('remarque')->nullable(); // Pour stocker des infos comme "+10€ pour les objets volumineux"
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grille_des_prix');
    }
}
