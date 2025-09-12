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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('num_cli');
            $table->string('nom_cli');
            $table->string('prenom_cli');
            $table->string('contact_cli');
            $table->string('Email_cli');
            $table->string('pwd_cli');
            $table->unsignedBigInteger('Id_admin')->nullable();
            $table->foreign('Id_admin')->references('Id_admin')->on('administrateurs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
