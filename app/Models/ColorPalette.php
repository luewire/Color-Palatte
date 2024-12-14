<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorPalette extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'colors']; // Pastikan 'colors' ada di fillable

    // Cast 'colors' to array automatically
    protected $casts = [
        'colors' => 'array',
    ];
}
