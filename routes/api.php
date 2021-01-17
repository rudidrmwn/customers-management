<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('/customers', [CustomerController::class,'index']);
Route::post('/customers/store', [CustomerController::class,'store']);
Route::get('/customers/edit/{id}', [CustomerController::class,'edit']);
Route::get('/customers/show/{id}', [CustomerController::class,'show']);
Route::put('/customers/update/{id}', [CustomerController::class,'update']);
Route::delete('/customers/delete/{id}', [CustomerController::class,'destroy']);
  
