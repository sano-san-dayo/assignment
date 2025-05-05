<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ContactsController::class, 'index']);
Route::post('/confirm', [ContactsController::class, 'contact']);
Route::post('/thanks', [ContactsController::class, 'confirm']);
Route::get('/register', [ContactsController::class, 'showRegister']);
Route::post('/register', [ContactsController::class, 'register']);
Route::post('/register', [ContactsController::class, 'register']);
Route::get('/login', [ContactsController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});