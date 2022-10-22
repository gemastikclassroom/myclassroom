<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * FITUR AUTENTIKASI
 * 
 * Untuk menerapkan autentikasi, tambahkan ->middleware(["auth", "verified"]).
 * Contoh : Route::get('/', function () { return view('welcome'); })->middleware(["auth", "verified"]);
 */


Auth::routes();
require __DIR__ . '/auth.php';

Route::view('/{path?}', 'welcome')
    ->where('path', '.*');
