<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaeVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cae_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->datetime('ini_date');
            $table->datetime('fin_date');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cae_vouchers');
    }
}
