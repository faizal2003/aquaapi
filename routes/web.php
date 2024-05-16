<?php

use App\Http\Controllers\sen_con;
use App\Http\Controllers\sen_warn;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sensor', [sen_con::class, 'index']);
Route::post('/sensor', [sen_con::class, 'store']);
Route::get('/warn/{sensor}', [sen_warn::class, 'setwarn']);
Route::get('/unwarn/{sensor}', [sen_warn::class, 'unsetwarn']);