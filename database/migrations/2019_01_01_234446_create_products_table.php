<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('productID');
            $table->string('name',100);
            $table->integer('qty')->default(0);
            $table->string('unit',50)->default(0);
            $table->double('price')->default(0);
            $table->string('imgName',150)->default(0);
            $table->string('status',50)->default('Pending');
            $table->string('tag',170)->nullable();
            $table->longText('description')->nullable();
            $table->integer('scatID')->unsigned()->index();
            $table->foreign('scatID')->references('scatID')->on('scats')->onDelete('cascade')->onUpdate('No Action');
            $table->integer('ssubcatID')->unsigned()->index();
            $table->foreign('ssubcatID')->references('ssubcatID')->on('ssubcats')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('products');
    }
}
