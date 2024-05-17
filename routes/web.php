<?php

use App\Http\Controllers\sen_con;
use App\Http\Controllers\sen_warn;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sensor', [sen_con::class, 'index']);
Route::get('/sensor/ph', [sen_con::class, 'indexph']);
Route::get('/sensor/wl', [sen_con::class, 'indexwl']);
Route::post('/sensor', [sen_con::class, 'store']);
Route::get('/warn/{sensor}', [sen_warn::class, 'setwarn']);
Route::get('/unwarn/{sensor}', [sen_warn::class, 'unsetwarn']);
Route::post('/sensor/ph', [sen_con::class, 'storeph']);
Route::post('/sensor/wl', [sen_con::class, 'storewl']);