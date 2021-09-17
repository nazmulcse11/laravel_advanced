<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin'],function(){
    Route::match(['get','post'],'/',[AdminController::class,'login']);
    Route::group(['middleware'=>'admin'],function(){
        Route::get('dashboard',[DashboardController::class,'dashboard']);
    });
    
});

