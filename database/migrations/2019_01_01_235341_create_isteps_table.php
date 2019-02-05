<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isteps', function (Blueprint $table) {
            $table->increments('istepID');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('imgName',150)->default(0)->nullable();
            $table->integer('iserieID')->unsigned()->index();
            $table->foreign('iserieID')->references('iserieID')->on('iseries')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('isteps');
    }
}
