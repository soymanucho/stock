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
          $table->bigIncrements('id');
          $table->string('code')->unique();
          $table->string('name');
          $table->float('price');
          $table->string('description');
          $table->integer('stock');
          $table->timestamps();
          $table->unsignedBigInteger('category_id');
          $table->unsignedBigInteger('brand_id');;

          $table->foreign('category_id')->references('id')->on('categories');
          $table->foreign('brand_id')->references('id')->on('brands');
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
