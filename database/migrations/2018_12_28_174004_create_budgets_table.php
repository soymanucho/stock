<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->datetime('emissions_date')->nullable();
          $table->datetime('expiration_date')->nullable();
          $table->boolean('budget_iva_condition')->nullable();
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
        Schema::dropIfExists('budgets');
    }
}
