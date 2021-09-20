<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\UserController;




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Frontend Routes 
Route::get('/',[IndexController::class,'index']);
Route::match(['get','post'],'/login-register',[UserController::class,'loginRegister']);
Route::post('/user-register',[UserController::class,'userRegister']);
Route::get('/user-logout',[UserController::class,'userLogout']);


// Backend Routes 
Route::group(['prefix'=>'admin'],function(){
    Route::match(['get','post'],'/',[AdminController::class,'login']);
    Route::group(['middleware'=>'admin'],function(){
        Route::get('dashboard',[DashboardController::class,'dashboard']);
        Route::get('logout',[AdminController::class,'logout']);

        Route::get('profile',[AdminController::class,'profile']);
        Route::post('update-admin-details',[AdminController::class,'updateAdminDetails']);
        Route::post('check-current-password',[AdminController::class,'checkCurrentPassword']);
        Route::post('update-current-password',[AdminController::class,'updateCurrentPassword']);
    });
    
});

