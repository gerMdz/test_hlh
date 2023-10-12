<?php

use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prueba', function () {

   return JWTAuth::parseToken()->authenticate();
});

Route::resource('tarea', \App\Http\Controllers\TareaController::class)->middleware('auth');

require __DIR__.'/auth.php';
