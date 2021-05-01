<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Models\Categories;
use App\Models\Competencies;
use App\Models\File;
use App\Models\Offers;


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
    return view('pagrindinis');
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
Route::get('/change_profile','HomeController@EditProfile');
Route::post('/change_profile','HomeController@Edit')->name('EditProfile');

Route::get('/upload-file', [\App\Http\Controllers\FreelancerController::CLASS, 'createForm']);

Route::post('/upload-file', [\App\Http\Controllers\FreelancerController::CLASS, 'fileUpload'])->name('fileUpload');
Route::get('freelancer/question',[\App\Http\Controllers\FreelancerController::CLASS,'becomequestion'])->name('question');
Route::resource('/competencies',\App\Http\Controllers\FreelancerController::class);
Route::get('freelancer/getcompetencies',[\App\Http\Controllers\FreelancerController::CLASS,'uploadCompetencies'])->name('uploadCompetencies');
Route::post('/competencies',[\App\Http\Controllers\FreelancerController::CLASS,'store'])->name('/competencies');

//Route::get('/change_password','HomeController@showChangePasswordForm');
//Route::post('/change_password','HomeController@changePassword')->name('changePassword');

//Route::delete('/delete', 'HomeController@delete');
//Route::delete('/delete',[\App\Http\Controllers\HomeController::CLASS,'delete'])->name('delete');
//Route::get('/subscribe','HomeController@subscribe');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('user')->group(function() {




    Route::get('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'EditProfile'])->name('editprofile');
    Route::post('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'Edit'])->name('changepswrd');
    Route::get('/change_password',[\App\Http\Controllers\HomeController::CLASS,'showChangePasswordForm'])->name('showChangePasswordForm');
    Route::post('/change_password',[\App\Http\Controllers\HomeController::CLASS,'changePassword'])->name('changePassword');
   // Route::delete('/delete',[\App\Http\Controllers\HomeController::CLASS,'delete'])->name('delete');
  //  Route::get('/subscribe',[\App\Http\Controllers\HomeController::CLASS,'subscribe'])->name('subscribe');






});
Route::middleware('freelancer')->group(function() {
    Route::get('freelancer/freelancerhome', [App\Http\Controllers\FreelancerController::class, 'index'])->name('freelancer');

});
Route::middleware('admin')->group(function() {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
});
Route::middleware('moderator')->group(function() {
    Route::get('/moderator', [App\Http\Controllers\Admin\ModeratorController::class,'index'])->name('moderator');
});


//Route::resource('/files',\App\Http\Controllers\FileController::class);
Route::get('/files/index',[\App\Http\Controllers\FileController::class,'index'])->name('freelacerProfile');
Route::get('freelancer/offers',[\App\Http\Controllers\FreelancerController::CLASS,'index'])->name('offersFreelancer');

Route::resource('/offers',\App\Http\Controllers\OffersController::class);
Route::get('freelancer/createoffers',[\App\Http\Controllers\OffersController::CLASS,'create'])->name('createoffers');

Route::post('/saveoffers',[\App\Http\Controllers\OffersController::CLASS,'store'])->name('saveoffers');

Route::get('/uploadcompetencies',[\App\Http\Controllers\OffersController::CLASS,'uploadCompetencies'])->name('uploadCompetencies');

//Route::get('offer/{$offer->id}/edit',[\App\Http\Controllers\OffersController::CLASS,'edit'])->name('editoffers');
