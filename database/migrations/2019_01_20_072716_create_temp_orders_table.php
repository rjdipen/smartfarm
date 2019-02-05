<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_orders', function (Blueprint $table) {
            $table->increments('temp_orderID');
            $table->integer('qty')->default(0);
            $table->string('unit',50)->default(0);
            $table->double('price')->default(0);
            $table->string('cookieID');
            $table->integer('productID')->unsigned()->index();
            $table->foreign('productID')->references('productID')->on('products')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('temp_orders');
    }
}
