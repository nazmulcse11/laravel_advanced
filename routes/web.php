<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\WebnotificationController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\UserController;




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get','post'],'login',function(){return redirect('/');});
Route::match(['get','post'],'register',function(){return redirect('/');});


// Frontend Routes 
Route::get('/',[IndexController::class,'index']);
Route::post('enroll-for-course',[IndexController::class,'enrollForCourse']);
Route::get('mark-as-read',[IndexController::class,'markAsRead']);
Route::match(['get','post'],'login-register',[UserController::class,'loginRegister'])->name('login');

//confirm user account
Route::match(['get','post'],'confirm/{code}',[UserController::class,'confirmAccount']);
//Reset Password
Route::match(['get','post'],'forgot-password', [UserController::class, 'forgotPassword']);

//Social login
Route::get('login/facebook', [UserController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [UserController::class, 'loginWithFacebook']);
Route::get('login/google', [UserController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [UserController::class, 'loginWithGoogle']);
Route::get('login/github', [UserController::class, 'redirectToGithub']);
Route::get('login/github/callback', [UserController::class, 'loginWithGithub']);

Route::post('user-register',[UserController::class,'userRegister']);
Route::group(['middleware'=>'auth'],function(){
    Route::get('user-logout',[UserController::class,'userLogout']);
    Route::get('user-profile',[UserController::class,'userprofile']);
    Route::post('update-user-details',[UserController::class,'updateUserDetails']);
    Route::post('check-current-password',[UserController::class,'checkCurrentPassword']);
    Route::post('update-current-password',[UserController::class,'updateCurrentPassword']);
});



// Backend Routes 
Route::group(['prefix'=>'admin'],function(){

    Route::match(['get','post'],'/',[AdminController::class,'login']);
    Route::group(['middleware'=>'admin'],function(){

    Route::get('dashboard',[DashboardController::class,'dashboard']);
    Route::get('change-enroll-status/{id}',[DashboardController::class,'enrollStatus']);

    Route::get('logout',[AdminController::class,'logout']);
    Route::get('profile',[AdminController::class,'profile']);
    Route::post('update-admin-details',[AdminController::class,'updateAdminDetails']);
    Route::post('check-current-password',[AdminController::class,'checkCurrentPassword']);
    Route::post('update-current-password',[AdminController::class,'updateCurrentPassword']);
    Route::get('webnotification',[WebnotificationController::class,'webnotification']);
    Route::match(['get','post'],'add-edit-notification/{id?}',[WebnotificationController::class,'addEditNotification']);
    Route::get('delete-record/{recordid}',[WebnotificationController::class,'deleteWebnotification']);

    

    });
    
});

