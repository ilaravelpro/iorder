<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/13/19, 8:04 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotOrdersPaymentLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_payment_log', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('payment_log_id')->unsigned();
            $table->primary(['order_id' , 'payment_log_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_payment_log');
    }
}
