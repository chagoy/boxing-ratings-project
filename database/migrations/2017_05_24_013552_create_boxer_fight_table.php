<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxerFightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxer_fight', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boxer_id')->unsigned();
            $table->foreign('boxer_id')->references('id')->on('boxers');
            $table->integer('fight_id')->unsigned();
            $table->foreign('fight_id')->references('id')->on('fights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxer_fight');
    }
}
