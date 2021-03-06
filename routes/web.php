<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/help', [\App\Http\Controllers\HelpController::class, 'index'])->name('help');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->middleware('admin')->name('admin-home');
    Route::resource('users', \App\Http\Controllers\UserManagementController::class);
    Route::resource('movies', \App\Http\Controllers\MovieManagementController::class);
});

Route::fallback(function () {
    return view('404');
});

Route::get('/movie', [App\Http\Controllers\movieController::class, 'index'])->name('movie.index');
Route::get('/movie/{id}', [App\Http\Controllers\movieController::class, 'index'])->name('movie.show');
