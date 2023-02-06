<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebLessonController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lesson', WebLessonController::class);

Route::view('/register', 'register_form');
Route::post('/register', [AuthController::class, 'register']);

Route::view('/login', 'login_form');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/token', [AuthController::class, 'token']);
