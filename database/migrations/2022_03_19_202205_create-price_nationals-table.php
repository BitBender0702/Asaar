<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('price_nationals', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->double('moyen');
            $table->double('pourcentage');
            $table->date('date');
            $table->integer('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('types');
            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products');
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
        //
        Schema::dropIfExists('price_nationals');

    }
};
