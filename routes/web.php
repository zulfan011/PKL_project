<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\konsumenController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\cuciankeluarController;

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

Auth::routes(
    [
        'register'=> false
    ]
);

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

// hanya untuk role admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|member']], function(){
    Route::get('/', function(){
        return view('home');
    });
    Route::resource('konsumen', konsumenController::class);
    Route::resource('pembayaran', pembayaranController::class);
    Route::resource('cucian_keluar', cuciankeluarController::class);
});

