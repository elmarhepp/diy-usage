<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateUsageWebhooksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usage_webhooks', function (Blueprint $table) {
            $table->integer('count_webhooks_daily')->default(0);
            $table->dateTime('last_webhook_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usage_webhooks', function (Blueprint $table) {
            //
        });
    }

}
