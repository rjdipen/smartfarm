<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titems', function (Blueprint $table) {
            $table->increments('titemID');
            $table->string('title');
            $table->text('description');
            $table->string('imgName',150)->nullable();
            $table->string('videoName',180)->nullable();
            $table->integer('tserieID')->unsigned()->index();
            $table->foreign('tserieID')->references('tserieID')->on('tseries')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('userID')->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('titems');
    }
}
