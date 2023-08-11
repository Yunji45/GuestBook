<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controller\Backend\DashboardController;

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
Route::post('/login-act',[LoginController::class,'act-login'])->name('proses.login');
Route::group(['middleware' => ['auth', 'role:admin']],function(){
    Route::get('/home', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

});

