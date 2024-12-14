<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ensure the DB facade is imported

class ModifyColorsInColorPalettesTable extends Migration
{
    public function up()
{
    // Pastikan kolom colors ada sebelum mengubahnya
    if (Schema::hasColumn('color_palettes', 'colors')) {
        DB::table('color_palettes')->whereNull('colors')->update(['colors' => json_encode([])]);
        Schema::table('color_palettes', function (Blueprint $table) {
            $table->json('colors')->default(json_encode([]))->change(); // Ubah kolom jika perlu
        });
    }
}


    public function down()
    {
        Schema::table('color_palettes', function (Blueprint $table) {
            $table->string('color_code')->nullable()->change();
        });
        
    }
}
