<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
            $table->integer('product_id')->primary();
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('authorizations');
            $table->string('title')->nullable();
            $table->string('product_type')->nullable();
            $table->string('vendor')->nullable();
            $table->string('image');
            $table->string('price')->nullable();
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
        Schema::drop('products');
    }

}
