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
    return view('top');
});
Route::get('/newReserve',function() {
    return view('newReserve');
});
Route::get('/login',function(){
    return view('login');
});
Route::get('/selectPlace',function() {
    return view('vaccine/selectPlace');
});
Route::get('/selectDay','App\Http\Controllers\Vaccinecontroller@day');
// Route::get('/selectPlace', 'App\Http\Controllers\Vaccinecontroller@place');
// Route::resource('vaccine','app\Http\Controllers\VaccineController::class');