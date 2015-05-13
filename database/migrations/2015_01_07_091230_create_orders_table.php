<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ($table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->integer('order_number')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('manual_order_id')->unsigned()->nullable();
            $table->string('order_type')->nullable();
            $table->string('customer')->nullable();
            $table->string('payment')->nullable();
            $table->string('fulfillment')->nullable();
            $table->string('total')->nullable();
            //$table->foreign('manual_order_id')->references('id')->on('manual_orders');
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
        Schema::drop('orders');
    }

}
