<?php

use App\Http\Controllers\sen_con;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sensor', [sen_con::class, 'index']);