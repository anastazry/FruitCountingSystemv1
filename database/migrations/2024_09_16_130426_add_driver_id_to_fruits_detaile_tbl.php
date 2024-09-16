<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->nullable();

            // Optional: Specify a constraint name to avoid guessing in the down() method
            $table->foreign('driver_id', 'fk_fruits_detaile_driver_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            // Use the constraint name if specified in the up() method
            $table->dropForeign('fk_fruits_detaile_driver_id'); 
            
            // Otherwise, Laravel typically auto-generates the name in this format
            // $table->dropForeign(['driver_id']); 
            
            $table->dropColumn('driver_id');
        });
    }
};
