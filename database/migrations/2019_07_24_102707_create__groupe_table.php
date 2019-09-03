<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Groupe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Titre',20);
            $table->string('Description');
            $table->timestamps();
            /*$table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Groupe');
    }
}
