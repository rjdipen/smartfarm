<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scats', function (Blueprint $table) {
            $table->increments('scatID');
            $table->string('name',40)->unique();
            $table->string('icon',100)->default('Null');
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
        Schema::dropIfExists('scats');
    }
}
