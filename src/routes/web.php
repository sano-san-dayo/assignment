<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/confirm', [ContactController::class, 'contact']);
Route::post('/thanks', [ContactController::class, 'confirm']);
Route::post('/register', [ContactController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});
Route::middleware('auth')->group(function () {
    Route::post('/admin', [AuthController::class, 'submit']);
});
