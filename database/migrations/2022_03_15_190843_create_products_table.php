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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('name');
            $table->string('path_image')->nullable();
            $table->boolean('display'); 
            $table->string('code');               
            $table->string('commun_name');
            $table->boolean('with_image');   
            $table->string('arabic_name')->nullable();
            $table->string('english_name')->nullable();
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories');
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
};
