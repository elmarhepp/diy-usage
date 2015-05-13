<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsageWebhooksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage_webhooks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->integer('count_webhook_customer')->default(0);
            $table->integer('count_webhook_product')->default(0);
            $table->integer('count_webhook_order')->default(0);
            $table->integer('count_webhook_shop')->default(0);
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
        Schema::drop('usage_webhooks');
    }

}
