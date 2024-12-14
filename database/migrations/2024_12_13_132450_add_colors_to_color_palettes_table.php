<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('color_palettes', function (Blueprint $table) {
            $table->json('colors')->default(json_encode([])); // Tambahkan kolom colors
        });
    }
    
    public function down()
    {
        Schema::table('color_palettes', function (Blueprint $table) {
            $table->dropColumn('colors'); // Hapus kolom saat rollback
        });
    }
    
};
