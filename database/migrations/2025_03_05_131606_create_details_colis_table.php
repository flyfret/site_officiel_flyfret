<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('details_colis', function (Blueprint $table) {
            $table->id('num_col');
            $table->string('num_details_colis')->unique();
            $table->string('type_colis');
            $table->decimal('quantite', 10, 2);
            $table->decimal('valeur_marchande', 10, 2)->nullable();

            $table->string('status')->default('en attente'); 
            $table->string('nom_lot')->nullable();
            $table->string('detail_specifique')->nullable();

            $table->unsignedBigInteger('expediteur_id');
            $table->foreign('expediteur_id')->references('id')->on('expediteurs')->onDelete('cascade');

            $table->unsignedBigInteger('destinataire_id');
            $table->foreign('destinataire_id')->references('id')->on('destinataires')->onDelete('cascade');
            $table->timestamps();



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_colis');
    }
}
