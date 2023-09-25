<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function(){
    dump("Test");
});
Route::post('/password/reset',\App\Http\Controllers\Password\SendCodeController::class);
Route::post('/password/new',\App\Http\Controllers\Password\ResetPasswordController::class);

Route::group(['prefix' =>'auth'], function(){
     Route::post('/confirm',\App\Http\Controllers\Auth\ConfirmRegisterController::class);

     Route::post('/register',\App\Http\Controllers\Auth\RegisterController::class);

     Route::post('/login',\App\Http\Controllers\Auth\LoginController::class);


     Route::group(['middleware' => ['auth:sanctum','verify_email']], function(){
        Route::post('/logout',\App\Http\Controllers\Auth\LogoutController::class);
     });
});


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/me',\App\Http\Controllers\Auth\MeController::class)->middleware('verify_email');;
    Route::group(['prefix' =>'items'], function(){

        Route::get('/',\App\Http\Controllers\Item\IndexController::class);
        Route::post('/',\App\Http\Controllers\Item\StoreController::class);
        Route::post('/{item}',\App\Http\Controllers\Item\UpdateController::class);
        Route::delete('/{item}',\App\Http\Controllers\Item\DeleteController::class);
        Route::post('/complete/{item}',\App\Http\Controllers\Item\CompleteController::class);
        Route::get('/tasks',\App\Http\Controllers\Item\TasksController::class);

    })->middleware('verify_email');

    Route::delete('/account',\App\Http\Controllers\Auth\DeleteAccountController::class);
});
