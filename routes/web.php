<?php

use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('user.login')->middleware('guest');

Route::post('/user-attempt-login',[UserController::class,'attemptLogin'])->name('user.attempt-login');

Auth::routes();


Route::group(['middleware' => 'check.user'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/user/reservation/store',[ReservationController::class,'store'])->name('reservation.store');
});
