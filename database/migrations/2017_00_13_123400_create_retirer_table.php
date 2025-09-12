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
        Schema::create('retirer', function (Blueprint $table) {
            $table->id();
            $table->string('num_col');
            $table->string('ville_retrait');
            // $table->string('code_post_retrait');
            $table->string('adresse_retrait')->nullable()->default(null);
            $table->date('date_retrait')->nullable();
            $table->timestamps();
            // Ajouter les clés étrangères
            $table->foreign('num_col')->references('num_col')->on('details_colis')->onDelete('cascade');
            $table->unsignedBigInteger('num_cli'); // Ajoute cette ligne
            $table->foreign('num_cli')->references('num_cli')->on('clients')->onDelete('cascade'); // Ajoute la clé étrangère
        });
    }

    public function down()
    {
        Schema::dropIfExists('retirer');
    }
};