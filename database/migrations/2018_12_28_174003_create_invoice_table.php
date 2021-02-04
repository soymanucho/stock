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
            $table->string('type')->nullable();
            $table->string('prefix_number')->nullable();
            $table->string('number')->nullable();
            $table->datetime('emissions_date')->nullable();
            $table->datetime('expiration_date')->nullable();
            $table->boolean('invoice_iva_condition')->nullable();
            $table->unsignedBigInteger('sale_id');

            $table->softDeletes();

            $table->foreign('sale_id')->references('id')->on('sales');

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
