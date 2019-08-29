<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcernerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerner', function (Blueprint $table) {
            $table->unsignedBigInteger('Prod_id');
            $table->foreign('Prod_id')->references('id')->on('Produit');
            $table->unsignedBigInteger('Dem_id');
            $table->foreign('Dem_id')->references('id')->on('Demande');
            $table->integer('Quantite');
            $table->date('Date');
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
        Schema::dropIfExists('concerner');
    }
}
