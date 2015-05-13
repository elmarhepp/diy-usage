<?php

use Illuminate\Database\Migrations\Migration;

class CreateManualOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_orders', function ($table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->string('order_type')->nullable();
            $table->integer('order_number')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('resend_date')->nullable();
            $table->integer('customer_id')->nullable();
            $table->text('customer_details')->nullable();
            $table->string('email_subject')->nullable();
            $table->text('email_preview')->nullable();
            $table->text('order_items')->nullable();
            $table->text('order_preview')->nullable();
            $table->string('direct_order_url')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('subtotal_with_currency')->nullable();
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
        Schema::drop('manual_orders');
    }

}
