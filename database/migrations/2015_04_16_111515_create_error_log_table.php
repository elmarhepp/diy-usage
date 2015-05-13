<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErrorLogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->string('shop')->nullable();
            $table->text('message')->nullable();
            $table->text('trail')->nullable();
            $table->string('module')->nullable();
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
        Schema::drop('error_log');
    }

}
