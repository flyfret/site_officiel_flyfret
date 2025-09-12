<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoginAttemptsToLogisticiens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('comptables', function (Blueprint $table) {
        $table->integer('login_attempts')->default(0);  // Ajoute la colonne 'login_attempts'
    });
}

public function down()
{
    Schema::table('comptables', function (Blueprint $table) {
        $table->dropColumn('login_attempts');
    });
}

}
