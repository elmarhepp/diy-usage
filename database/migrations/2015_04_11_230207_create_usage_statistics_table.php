<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsageStatisticsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usage_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->integer('start_page_hits')->default(0);
            $table->integer('new_order_page_hits')->default(0);
            $table->integer('settings_page_hits')->default(0);
            $table->integer('count_api_order')->default(0);
            $table->integer('count_email_order')->default(0);
            $table->integer('count_storefront_order')->default(0);
            $table->integer('count_errors')->default(0);
            $table->boolean('uninstalled')->default(false);
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
        Schema::drop('usage_statistics');
    }

}
