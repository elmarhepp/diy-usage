<?php

use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function ($table) {
            $table->integer('variant_id')->primary();
            $table->integer('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('price')->nullable();
            $table->string('inventory_management')->nullable();
            $table->integer('inventory_quantity')->nullable();
            $table->boolean('taxable')->nullable();
            $table->boolean('requires_shipping')->nullable();
            $table->string('fulfillment_service')->nullable();
            $table->integer('grams')->nullable();
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
        Schema::drop('variants');
    }

}
