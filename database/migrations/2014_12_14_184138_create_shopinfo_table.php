<?php

use Illuminate\Database\Migrations\Migration;

class CreateShopinfoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_info', function ($table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->string('shopify_shop_id');
            $table->string('currency')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('province_code')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('domain')->nullable();
            $table->string('money_format');
            $table->string('taxes_included')->nullable();
            $table->string('tax_shipping')->nullable();
            $table->string('county_taxes')->nullable();
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
        Schema::drop('shop_info');
    }

}
