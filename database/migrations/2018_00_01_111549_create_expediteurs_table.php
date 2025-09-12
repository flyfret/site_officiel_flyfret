<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('expediteurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('num_cli');
            $table->string('nom_expediteur');
            $table->timestamps();

            $table->foreign('num_cli')->references('num_cli')->on('clients')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('expediteurs');
    }
};
