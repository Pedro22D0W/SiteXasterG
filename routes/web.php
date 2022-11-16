<?php

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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/users/show', [App\Http\Controllers\HomeController::class,'show']);
Route::get('/users/edit/{id}', [App\Http\Controllers\HomeController::class,'edit']);
Route::put('/users/update/{id}', [App\Http\Controllers\HomeController::class,'update']);
Route::delete('/users/{id}', [App\Http\Controllers\HomeController::class,'destroy']);


