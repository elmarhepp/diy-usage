<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateAuthorizationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('authorizations', function (Blueprint $table) {
            $table->boolean('installed');
            $table->dropColumn('import_products');
            $table->dropColumn('import_customers');
            $table->integer('simulation')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authorizations', function (Blueprint $table) {
            $table->dropColumn('installed');
            $table->boolean('import_products');
            $table->boolean('import_customers');
            $table->dropColumn('simulation');
        });
    }

}
