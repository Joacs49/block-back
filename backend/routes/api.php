<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Notice\NoticesController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Interaction\InteractionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function (){
    Route::post('/login','login');
    Route::post('/logout','logout')->middleware('auth:sanctum');
});

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::group(['middleware' => ['auth:sanctum', 'role:ADMIN', 'permission:ENVIAR']], function (){
        Route::get('/showUser','showUser');
        Route::put('/updateUser/{user}', 'updateUser');
    });
});

Route::controller(NoticesController::class)->prefix('notices')->group(function (){
    Route::get('/showNoticesAll', 'showNoticesAll');

    Route::group(['middleware' => ['auth:sanctum','role:ADMIN','permission:ENVIAR']], function (){
        Route::get('/showNotices', 'showNotices');
        Route::get('/showLastNotices','showLastNotices');
        Route::get('/countNotices','countNotices');
        Route::post('/createNotices','createNotices');
        Route::put('/updateNotices/{id}','updateNotices');
        Route::delete('/destroyNotices/{id}', 'destroyNotices');
    });
});

Route::controller(InteractionController::class)->prefix('interactions')->group(function () {
    Route::group(['middleware' => ['auth:sanctum','role:ADMIN','permission:ENVIAR']], function () {
        Route::get('/insertView','insertView');
        Route::get('/getView','getView');
    });
});