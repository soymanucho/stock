<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street');
            $table->integer('number')->nullable();
            $table->string('floor')->nullable();
            $table->string('cp')->nullable();
            $table->double('latitude')->nullable()->index();
            $table->double('longitude')->nullable()->index();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::table('addresses', function (Blueprint $table) {

            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
