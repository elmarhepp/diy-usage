<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function ($table) {
            $table->integer('address_id')->primary();
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->integer('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('province')->nullable();
            $table->string('zip')->nullable();
            $table->string('name')->nullable();
            $table->string('province_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->boolean('default');
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
        Schema::drop('addresses');
    }

}
