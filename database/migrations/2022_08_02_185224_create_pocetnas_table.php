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
        Schema::create('pocetnas', function (Blueprint $table) {
            $table->id();
            $table->string('naslov')->nullable();
            $table->text('slogan')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('ulica')->nullable();
            $table->integer('broj')->nullable();
            $table->string('mjesto')->nullable();
            $table->integer('pocetakTjedna')->nullable();
            $table->integer('krajTjedna')->nullable();
            $table->integer('pocetakPetak')->nullable();
            $table->integer('krajPetak')->nullable();
            $table->integer('pocetakNedjelja')->nullable();
            $table->integer('krajNedjelja')->nullable();
            $table->string('slika')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pocetnas');
    }
};
