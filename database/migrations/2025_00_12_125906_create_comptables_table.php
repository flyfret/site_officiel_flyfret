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
        Schema::create('comptables', function (Blueprint $table) {
            $table->id('num_compta');
            $table->string('nom_compta');
            $table->string('prenom_compta');
            $table->string('contact_compta');
            $table->string('Email_compta')->unique();
            $table->string('Password_compta');
            $table->unsignedBigInteger('Id_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptables');
    }
};
