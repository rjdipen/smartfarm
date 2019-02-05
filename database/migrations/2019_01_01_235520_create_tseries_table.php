<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tseries', function (Blueprint $table) {
            $table->increments('tserieID');
            $table->string('title')->unique();
            $table->string('authorName')->nullable();
            $table->string('imgName',150)->nullable();
            $table->text('description')->nullable();
            $table->text('tag')->nullable();
            $table->integer('icatID')->unsigned()->index();
            $table->foreign('icatID')->references('icatID')->on('icats')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('isubcatID')->unsigned()->index();
            $table->foreign('isubcatID')->references('isubcatID')->on('isubcats')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('tseries');
    }
}
