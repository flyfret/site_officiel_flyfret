<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historique_facture', function (Blueprint $table) {
            $table->id('num_hist_fact');
            $table->string('champ_modifié');
            $table->date('date_modification');
            $table->string('Ancienne_valleur');
            $table->string('Nouvelle_valleur');
            $table->text('commentaire');
            $table->unsignedBigInteger('num_fact'); // Clé étrangère vers une facture
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_factures');
    }
};
