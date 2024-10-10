<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin', [LoginController::class, 'index'])->name('admin.login-view');
Route::POST('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::prefix('/admin')->middleware('auth:admin')->group(function() {
    Route::POST('/logout',[LoginController::class,'Logout'])->name('logout');

    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard.page');
    Route::get('/profile_update/view', [LoginController::class, 'profile_update_view']);
    Route::post('/update_profile',[LoginController::class , 'update_profile'])->name('update_profile');
});
