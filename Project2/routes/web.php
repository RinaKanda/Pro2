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
//処理なし
Route::get('/', function () {
    return view('top');
});
Route::get('/newReserve',function() {
    return view('newReserve');
});
Route::get('/login',function(){
    return view('login');
});
Route::get('reserveFinish',function(){
    return view('reserveFinish');
});
// Route::get('/selectDay/{key01}',function($key01){
//     return 'key01 '.$key01;
// });

//処理有
Route::get('/selectPlace', 'App\Http\Controllers\VaccineController@place');
Route::post('/selectPlace','App\Http\Controllers\VaccineController@place');
Route::get('/selectDay/{key01}','App\Http\Controllers\Vaccinecontroller@day');
Route::post('/selectDay','App\Http\Controllers\Vaccinecontroller@day');
Route::get('/selectTime','App\Http\Controllers\Vaccinecontroller@Time');
Route::get('/reserveConfirm','App\Http\Controllers\Vaccinecontroller@Confirm');
// Route::resource('vaccine','app\Http\Controllers\VaccineController::class');