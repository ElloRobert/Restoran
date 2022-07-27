<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proizvodis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NazivJela');
            $table-> decimal('Cijena');
            $table-> string('Opis');
            $table-> string('Slika');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proizvodis');
    }
};
