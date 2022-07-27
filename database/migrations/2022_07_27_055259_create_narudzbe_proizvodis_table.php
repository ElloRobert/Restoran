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
        Schema::create('narudzbe_proizvodis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('narudzbe_id');
            $table->bigInteger('proizvodi_id');
            $table->bigInteger('proizvod_kolicina');
            $table->timestamps();
         
               // $table->foreign('narudzbe_id')->references('id')->on('narudzbes');
                //$table->foreign('proizvodi_id')->references('id')->on('proizvodis');
        
        });
    }
  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('narudzbe_proizvodis');
    }
};