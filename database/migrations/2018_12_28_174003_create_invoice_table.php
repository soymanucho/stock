<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('prefix_number')->nullable();
            $table->bigInteger('number')->nullable();
            $table->datetime('emissions_date')->nullable();
            $table->datetime('expiration_date')->nullable();

            $table->unsignedBigInteger('cae_voucher_id');
            $table->unsignedBigInteger('sale_id');

            $table->softDeletes();

            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('cae_voucher_id')->references('id')->on('cae_vouchers');

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
        Schema::dropIfExists('invoices');
    }
}
