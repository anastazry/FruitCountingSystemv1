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
            $table->renameColumn('images-path', 'image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fruits_detaile_tbl', function (Blueprint $table) {
            $table->renameColumn('image_path', 'images-path');
        });
    }
};
