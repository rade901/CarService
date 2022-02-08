<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ClientCarController;
use App\Http\Controllers\ClientServiceController;

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

Route::post('/clients_service',[ClientServiceController::class,'store']);
Route::post('/clients_car',[ClientCarController::class,'store']);
Route::post('/clients',[ClientController::class,'store']);
Route::post('/clients/{id}',[ClientController::class,'destroy']);
Route::post('/category',[CategoryController::class,'store']);
Route::post('/category/{id}',[CategoryController::class,'destroy']);
Route::post('/cars',[CarController::class,'store']);
Route::post('/cars/{id}',[CarController::class,'destroy']);
Route::post('/services',[ServiceController::class,'store']);
Route::post('/services/{id}',[ServiceController::class,'destroy']);
Route::post('/search',[ClientCarController::class,'store']);
