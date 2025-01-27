<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorPaletteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/home', [ColorPaletteController::class, 'index']);

Route::get('/auth-login', function () {
    return view('login');
});




