<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treviews', function (Blueprint $table) {
            $table->increments('treviewID');
            $table->text('comment')->nullable();
            $table->integer('rating')->default(0);
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
        Schema::dropIfExists('treviews');
    }
}
