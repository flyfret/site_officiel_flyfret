<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('destinataires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('num_cli');
            $table->string('nom_destinataire');
            $table->unsignedBigInteger('expediteur_id'); // Ajout de la colonne manquante
            $table->timestamps();

            $table->foreign('num_cli')->references('num_cli')->on('clients')->onDelete('cascade');
            $table->foreign('expediteur_id')->references('id')->on('expediteurs')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('destinataires');
    }
};
