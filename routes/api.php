<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'auth'], function(){
     Route::post('/register',\App\Http\Controllers\Auth\RegisterController::class);
     Route::post('/login',\App\Http\Controllers\Auth\LoginController::class);

     Route::group(['middleware' => ['auth:sanctum','verified']], function(){
        Route::post('/logout',\App\Http\Controllers\Auth\LogoutController::class);
     });
});


Route::group(['middleware' => ['auth:sanctum','verified']], function(){
    Route::get('/me',\App\Http\Controllers\Auth\MeController::class);
    Route::group(['prefix' =>'items'], function(){

        Route::get('/',\App\Http\Controllers\Item\IndexController::class);
        Route::post('/',\App\Http\Controllers\Item\StoreController::class);
        Route::post('/{item}',\App\Http\Controllers\Item\UpdateController::class);
        Route::delete('/{item}',\App\Http\Controllers\Item\DeleteController::class);
        Route::post('/complete/{item}',\App\Http\Controllers\Item\CompleteController::class);
        Route::get('/tasks',\App\Http\Controllers\Item\TasksController::class);

    });
});
