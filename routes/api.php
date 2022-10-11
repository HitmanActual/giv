<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(["middleware" => "auth:api"], function () {
    Route::get('/logout', [AuthController::class,'logout']);
});




Route::group(['prefix'=>'categories'],function(){
    Route::get('/',[CategoryController::class,'index']);
    Route::post('/',[CategoryController::class,'store']);
    Route::get('/{id}',[CategoryController::class,'show']);
    Route::patch('/{id}',[CategoryController::class,'update']);
    Route::delete('/{id}',[CategoryController::class,'destroy']);
});

Route::group(['prefix'=>'shops'],function(){
    Route::get('/',[ShopController::class,'index']);
    Route::post('/',[ShopController::class,'store']);
    Route::get('/{id}',[ShopController::class,'show']);
    Route::patch('/{id}',[ShopController::class,'update']);
    Route::delete('/{id}',[ShopController::class,'destroy']);
});


Route::group(['prefix'=>'products'],function(){
    Route::get('/',[ProductController::class,'index']);
    Route::post('/',[ProductController::class,'store']);
    Route::get('/{id}',[ProductController::class,'show']);
    Route::patch('/{id}',[ProductController::class,'update']);
    Route::delete('/{id}',[ProductController::class,'destroy']);
});

