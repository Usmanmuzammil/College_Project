<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('webiste.home');
});
Route::get('/about',function() {
    return view('webiste.about');
});
Route::get('/courses',function() {
    return view('webiste.courses');
});
Route::get('/teachers',function() {
    return view('webiste.teachers');
});
Route::get('/blog',function() {
    return view('webiste.blog');
});
Route::get('/contact',function() {
    return view('webiste.contact');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::POST('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::prefix('/admin')->middleware('auth:admin')->group(function() {
    Route::POST('/logout',[LoginController::class,'Logout'])->name('logout');

    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard.page');
    Route::get('/profile_update/view', [LoginController::class, 'profile_update_view']);
    Route::post('/update_profile',[LoginController::class , 'update_profile'])->name('update_profile');

    Route::get('/user',[UserController::class, 'index'])->name('users.index');
});
