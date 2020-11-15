<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('tenants', \App\Http\Controllers\TenantController::class);
    Route::get('setpassword', [\App\Http\Controllers\SetPasswordController::class, 'create'])->name('setpassword');
    Route::post('setpassword', [\App\Http\Controllers\SetPasswordController::class, 'store'])->name('setpassword.store');


});

Route::get('invitation/{user}', [\App\Http\Controllers\TenantController::class, 'invitation'])->name('invitation');
