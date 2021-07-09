<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DepartmentController, PositionController, UserController};


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

Route::middleware('auth')->group(function () {
    Route::resource('departments', DepartmentController::class, ['except' => [ 'show' ]]);
    Route::resource('positions', PositionController::class, ['except' => [ 'show' ]]);
    Route::resource('users', UserController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
