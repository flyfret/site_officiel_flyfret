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
        Schema::create('gestion_colis', function (Blueprint $table) {
            $table->unsignedBigInteger('num_hist_colis');
            $table->unsignedBigInteger('num_logist');
            $table->unsignedBigInteger('num_colis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_colis');
    }
};
