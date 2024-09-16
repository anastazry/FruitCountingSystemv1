<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMandorIdNullableInFruitsDetaileTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->unsignedBigInteger('mandor_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->unsignedBigInteger('mandor_id')->nullable(false)->change();
        });
    }
}
