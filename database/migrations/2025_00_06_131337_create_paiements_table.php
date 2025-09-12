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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id('num_paiement');
            $table->dateTime('Date_paiement');
            $table->decimal('Montant', 10, 2);
            $table->string('mode_paiement');
            $table->unsignedBigInteger('num_fact');
            $table->string('transaction_id')->unique();
            $table->timestamps();

            $table->foreign('num_fact')->references('id')->on('factures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
