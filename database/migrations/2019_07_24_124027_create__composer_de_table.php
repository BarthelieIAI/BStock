<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposerDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composer_de', function (Blueprint $table) {
            $table->unsignedBigInteger('prod_id');
            $table->foreign('prod_id')->references('id')->on('produit');
            $table->unsignedBigInteger('Appro_id');
            $table->foreign('Appro_id')->references('id')->on('approvisionnement');
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
        Schema::dropIfExists('composer_de');
    }}

