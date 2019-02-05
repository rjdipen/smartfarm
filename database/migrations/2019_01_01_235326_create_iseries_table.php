<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iseries', function (Blueprint $table) {
            $table->increments('iserieID');
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->string('imgName',150)->default(0);
            $table->text('tag')->nullable();
            $table->integer('icatID')->unsigned()->index();
            $table->foreign('icatID')->references('icatID')->on('icats')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('isubcatID')->unsigned()->index();
            $table->foreign('isubcatID')->references('isubcatID')->on('isubcats')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('stateID')->unsigned()->index();
            $table->foreign('stateID')->references('stateID')->on('states')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('cityID')->unsigned()->index();
            $table->foreign('cityID')->references('cityID')->on('cities')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('iseries');
    }
}
