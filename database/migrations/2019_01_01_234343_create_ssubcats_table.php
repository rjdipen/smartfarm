<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSsubcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssubcats', function (Blueprint $table) {
            $table->increments('ssubcatID');
            $table->string('name',40)->unique();
            $table->string('icon',100)->default('Null');
            $table->integer('scatID')->unsigned()->index();
            $table->foreign('scatID')->references('scatID')->on('scats')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('ssubcats');
    }
}
