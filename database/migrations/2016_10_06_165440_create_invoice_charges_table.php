<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('invoice_charges', function (Blueprint $table) {
          $table->string('invoice_num');
          $table->string('tracking_no');
          $table->enum('charge_type', ['FRT', 'FUE', 'HAZ']);
          $table->float('charge_amount', 8, 2);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_charges');
    }
}
