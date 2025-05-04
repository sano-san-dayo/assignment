<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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
Route::post('/confirm', [ContactsController::class, 'confirm']);
Route::get('/thanks', [ContactsController::class, 'thanks']);
Route::post('/thanks', [ContactsController::class, 'index']);
Route::get('/admin', [ContactsController::class, 'admin']);
Route::get('/register', [ContactsController::class, 'register']);
Route::get('/login', [ContactsController::class, 'login']);
