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
        // Migration for color_palettes table
Schema::create('color_palettes', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // Nama palet warna
    $table->json('colors'); // Kolom untuk menyimpan array warna
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_palettes');
    }
};
