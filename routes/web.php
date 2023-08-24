<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TamuController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\VerifikasiTamuController;

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
//Auth
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login-act',[LoginController::class,'actlogin'])->name('proses.login');

Route::group(['middleware' => ['auth', 'role:admin']],function(){

    //Dashboard
    Route::get('/home', [DashboardController::class,'index'])->name('home');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

    //Tamu
    Route::get('/DataTamu',[TamuController::class,'index'])->name('datatamu');
    Route::get('/TambahTamu', [TamuController::class,'create'])->name('create.tamu');
    Route::post('/Save-Tamu',[TamuController::class,'store'])->name('save.tamu');
    Route::get('/Tamu/{id}/destroy',[TamuController::class,'destroy']);
    Route::get('/Tamu/{id}/edit',[TamuController::class,'edit']);
    Route::get('/View/{id}/tamu',[TamuController::class,'view']);
    Route::post('/Tamu-update',[TamuController::class,'update'])->name('update.tamu');

    //Event
    Route::get('/DataEvent',[EventController::class,'index'])->name('dataevent');
    Route::get('/TambahEvent',[EventController::class,'create'])->name('create.event');
    Route::post('/save-event',[EventController::class,'store'])->name('uploads.store');
    Route::get('/event/{id}/destroy',[EventController::class,'destroy']);

    //verifikasi
    Route::get('/VerifikasiData', [VerifikasiTamuController::class,'index'])->name('verifikasi.tamu');
    Route::get('/VerifikasiData/{id}/verfikasi',[VerifikasiTamuController::class,'verifikasi']);
});

