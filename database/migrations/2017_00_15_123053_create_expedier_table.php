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
        Schema::create('expedier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('num_cli');
            $table->unsignedBigInteger('num_col');
            // $table->string('num_details_colis');
            $table->string('type_expedition');
            $table->string('mode_expedition');
            $table->string('ville_expedition');
            $table->string('adresse_expediteur');
            $table->date('date_expedition')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('num_cli')->references('num_cli')->on('clients')->onDelete('cascade');
            $table->foreign('num_col')->references('num_col')->on('details_colis')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('expedier');
    }
};