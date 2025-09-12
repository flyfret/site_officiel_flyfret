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
        Schema::create('logisticiens', function (Blueprint $table) {
            $table->id('num_logist');
            $table->string('nom_logist');
            $table->string('prenom_logist');
            $table->string('password_logist');
            $table->string('Email_logist')->unique();
            $table->string('contact_logist');
            $table->unsignedBigInteger('Id_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logisticiens');
    }
};
