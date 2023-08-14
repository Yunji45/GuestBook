<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TamuController;
use App\Http\Controllers\Backend\EventController;

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
    return view('welcome');
});
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login-act',[LoginController::class,'actlogin'])->name('proses.login');
Route::group(['middleware' => ['auth', 'role:admin']],function(){
    Route::get('/home', [DashboardController::class,'index'])->name('home');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/DataTamu',[TamuController::class,'index'])->name('datatamu');

    Route::get('/DataEvent',[EventController::class,'index'])->name('dataevent');
    Route::get('/TambahEvent',[EventController::class,'create'])->name('create.event');
    Route::post('/save-event',[EventController::class,'store'])->name('uploads.store');
});

