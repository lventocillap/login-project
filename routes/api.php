<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[AuthController::class,'login'])->withoutMiddleware(Authentication::class);
Route::post('/logout',[AuthController::class,'logout']);
Route::get('/prueba',[AuthController::class,'prueba']);

Route::group([
    'prefix' => 'product',
    'controller' => ProductController::class
], static function(){
    Route::get('/','getProducts');
    Route::get('/{productId}','getProduct');
    Route::post('/','store');
    Route::put('/{productId}','update');
    Route::delete('/{productId}','delete');
});