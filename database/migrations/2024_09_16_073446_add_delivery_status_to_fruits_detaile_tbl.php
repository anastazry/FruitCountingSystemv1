<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryStatusToFruitsDetaileTbl extends Migration
{
    public function up()
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->string('delivery_status')->nullable(); // Ensure this is correct
        });
    }

    public function down()
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->dropColumn('delivery_status');
        });
    }
}
