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
    {Schema::create('historiques_colis', function (Blueprint $table) {
        $table->id('num_hist_colis');
        $table->string('libelle_colis');
        $table->timestamp('date_modification');
        $table->string('Statut_colis');
        $table->text('commentaire');
        $table->string('num_details_colis');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_colis');
    }
};
