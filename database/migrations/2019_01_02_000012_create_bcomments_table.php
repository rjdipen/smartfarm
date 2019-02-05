<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcomments', function (Blueprint $table) {
            $table->increments('bcommentID');
            $table->text('comment')->nullable();
            $table->integer('blogID')->unsigned()->index();
            $table->foreign('blogID')->references('blogID')->on('blogs')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('bcomments');
    }
}
