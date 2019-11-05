<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


      Schema::create('locations', function(Blueprint $table) {
			$table->bigIncrements('id');
      $table->bigInteger('province_id')->unsigned();
      $table->string('name');
      $table->string('department')->nullable();
      $table->decimal('latitude', 10, 8)->nullable();
      $table->decimal('longitude', 11, 8)->nullable();
      $table->timestamps();
      $table->softDeletes();
		});


        Schema::table('locations', function (Blueprint $table) {

            $table->foreign('province_id')->references('id')->on('provinces');

        });
    }


    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
