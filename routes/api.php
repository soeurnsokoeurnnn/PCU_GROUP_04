<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/list-product',  [ApiController::class, 'listProduct']);
Route::get('/product/{id}',   [ApiController::class, 'getProduct']);


Route::post('/login',                 [ApiController::class, 'userLogin']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/add-news',  [ApiController::class, 'addNews']);
});


