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

Route::get('profile', function() {
    $user = Auth::user();
    return view('profile.index', compact('user'));
});

Route::get('profile/edit', function() {
    $user = Auth::user();
    return view('profile.edit', compact('user'));
});

Route::middleware('user')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/offers',\App\Http\Controllers\OffersController::class);
    Route::get('/createoffers',[\App\Http\Controllers\OffersController::CLASS,'create'])->name('createoffers');
    Route::post('/saveoffers',[\App\Http\Controllers\OffersController::CLASS,'store'])->name('saveoffers');
    Route::get('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'EditProfile'])->name('editprofile');
    Route::post('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'Edit'])->name('changepswrd');
    Route::get('/change_password',[\App\Http\Controllers\HomeController::CLASS,'showChangePasswordForm'])->name('showChangePasswordForm');
    Route::post('/change_password',[\App\Http\Controllers\HomeController::CLASS,'changePassword'])->name('changePassword');

    Route::delete('/delete',[\App\Http\Controllers\HomeController::CLASS,'delete'])->name('delete');
    Route::get('/subscribe',[\App\Http\Controllers\HomeController::CLASS,'subscribe'])->name('subscribe');

});
Route::middleware('admin')->group(function() {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
});
Route::middleware('moderator')->group(function() {
    Route::get('/moderator', [App\Http\Controllers\Admin\ModeratorController::class,'index'])->name('moderator');
});




