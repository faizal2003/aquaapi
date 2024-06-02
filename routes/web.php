<?php

use App\Http\Controllers\sen_con;
use App\Http\Controllers\sen_warn;
use App\Http\Controllers\sensorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sensor', [sen_con::class, 'index']);
Route::get('/sensor/ph', [sen_con::class, 'indexph']);
Route::get('/sensor/wl', [sen_con::class, 'indexwl']);
Route::get('/getph', [sen_con::class, 'getph']);
Route::get('/getec', [sen_con::class, 'getec']);
Route::get('/getwl', [sen_con::class, 'getwl']);
Route::get('/man/ph', [sensorController::class, 'indexph']);
Route::get('/man/tds', [sensorController::class, 'indextds']);
Route::get('/man/turbid', [sensorController::class, 'indexturbid']);
Route::get('/man/temp', [sensorController::class, 'indextemp']);
Route::get('/test', [sensorController::class, 'test']);
Route::get('/warn/{sensor}', [sen_warn::class, 'setwarn']);
Route::get('/unwarn/{sensor}', [sen_warn::class, 'unsetwarn']);
Route::post('/sensor', [sen_con::class, 'store']);
Route::post('/sensor/ph', [sen_con::class, 'storeph']);
Route::post('/sensor/wl', [sen_con::class, 'storewl']);
Route::post('/feed', [sen_con::class, 'feeder']);
Route::post('/man/ph', [sensorController::class, 'storeph']);
Route::post('/man/tds', [sensorController::class, 'storetds']);
Route::post('/man/turbid', [sensorController::class, 'storeturbid']);
Route::post('/man/temp', [sensorController::class, 'storetemp']);