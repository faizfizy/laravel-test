<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('paid');
            $table->double('tax_amount', 8, 2);
            $table->double('amount', 11, 2);
            $table->boolean('refunded');
            $table->timestamps();
            
            $table->integer('payment_detail_id')->unsigned();
            $table->foreign('payment_detail_id')->references('id')->on('payment_details');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
