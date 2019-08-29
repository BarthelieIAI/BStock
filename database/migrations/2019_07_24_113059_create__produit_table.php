<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTable extends Migration
{
    /**it
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Libelle',20);
            $table->integer('quantité');
            $table->unsignedBigInteger('Cat_id');
            $table->timestamps();

            $table->foreign('Cat_id')->references('id')->on('Categeorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::dropIfExists('produit');
    }
}
