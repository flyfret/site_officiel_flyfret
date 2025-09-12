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
        Schema::create('factures', function (Blueprint $table) {
            $table->id('num_fact');
            $table->string('libelle_fact');
            $table->float('montant_tot_fact'); // Utilisation de float pour le montant total
            $table->float('tva_fact'); // Utilisation de float pour la TVA
            $table->string('statut_fact');
            $table->unsignedBigInteger('num_cli');
           $table->unsignedBigInteger('num_col');
            $table->foreign('num_cli')->references('num_cli')->on('clients')->onDelete('cascade');
            $table->foreign('num_col')->references('num_col')->on('details_colis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
