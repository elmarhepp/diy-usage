<?php

use Illuminate\Database\Migrations\Migration;

class CreateWebhookDataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhook_data', function ($table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->string('shopName')->nullable();
            $table->string('topic')->nullable();
            $table->mediumtext('data')->nullable();
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
        Schema::drop('webhook_data');
    }

}
