<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateLogForHealthCheckTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_for_heath_check', function (Blueprint $table) {
            $table->integer('is_updating')->default(0);
            $table->dateTime('start_updating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_for_heath_check', function (Blueprint $table) {
            //
        });
    }

}
