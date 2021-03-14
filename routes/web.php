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
Route::get('/logout', function (){
    auth()->logout();
    return redirect('/login');
});
Route::middleware('user')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware('admin')->group(function() {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
});
Route::middleware('moderator')->group(function() {
    Route::get('/moderator', [App\Http\Controllers\Admin\ModeratorController::class,'index'])->name('moderator');
});
