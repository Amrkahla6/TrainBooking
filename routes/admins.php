<?php


// Admin Routes
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ReservationController;


Route::prefix("admin")->group(function(){


    //Admin Login
    Route::get('/', function () {
        return view('admins.auth.login');
    })->name('admin.login')->middleware('guest');
    Route::post('/attempt-login',[AdminController::class,'attemptLogin'])->name('admin.attempt-login');

    //All Admin Routes
    Route::group(['middleware' => 'check.admin'], function () {
        //Admin Home
        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

        //Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        //All reservations data
        Route::get('/reservations/data',  [ReservationController::class, 'getData'])->name('admin.reservations.data');

    });
});
