
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
use App\Http\Controllers\OrderController;


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

Route::get('/upload-file', [\App\Http\Controllers\FreelancerController::CLASS, 'createForm']);

Route::post('/upload-file', [\App\Http\Controllers\FreelancerController::CLASS, 'fileUpload'])->name('fileUpload');
Route::get('freelancer/question',[\App\Http\Controllers\FreelancerController::CLASS,'becomequestion'])->name('question');
Route::resource('/competencies',\App\Http\Controllers\FreelancerController::class);
Route::get('freelancer/getcompetencies',[\App\Http\Controllers\FreelancerController::CLASS,'uploadCompetencies'])->name('uploadCompetencies');
Route::post('/competencies',[\App\Http\Controllers\FreelancerController::CLASS,'store'])->name('/competencies');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/my-profile-update', [App\Http\Controllers\HomeController::class, 'profileupdate'])->name('myprofileupdate');

Route::middleware('user')->group(function() {

//    Route::get('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'EditProfile'])->name('editprofile');
//    Route::post('/change_profile',[\App\Http\Controllers\HomeController::CLASS,'Edit'])->name('updateprofile');
//    Route::get('/change_password',[\App\Http\Controllers\HomeController::CLASS,'showChangePasswordForm'])->name('showChangePasswordForm');
//    Route::post('/change_password',[\App\Http\Controllers\HomeController::CLASS,'changePassword'])->name('changePassword');
   // Route::delete('/delete',[\App\Http\Controllers\HomeController::CLASS,'delete'])->name('delete');
  //  Route::get('/subscribe',[\App\Http\Controllers\HomeController::CLASS,'subscribe'])->name('subscribe');

});
Route::middleware('freelancer')->group(function() {
    Route::get('freelancer/freelancerhome', [App\Http\Controllers\FreelancerController::class, 'index'])->name('freelancer');

});
Route::middleware('admin')->group(function() {
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
    Route::get('/admin/users', [App\Http\Controllers\Admin\AdminController::class,'showUsers'])->name('admin.showUsers');
    Route::get('/admin/user/{id}', [App\Http\Controllers\Admin\AdminController::class,'showOneUser'])->name('showOneUser');
    Route::get('/admin/categories',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('categories');
    Route::get('/admin/conflicts', [\App\Http\Controllers\ConflictsController::class, 'index'])->name('conflicts');
    Route::get('/admin/conflict/{id}', [\App\Http\Controllers\ConflictsController::class, 'showOne'])->name('showOne');
    Route::get('/admin/statistics', [App\Http\Controllers\Admin\AdminController::class, 'statistics'])->name('statistics');
    Route::get('/admin/categories/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('edit');
    Route::post('/admin/user/{id}/bonus', [App\Http\Controllers\Admin\AdminController::class, 'bonus'])->name('bonus');
});
Route::middleware('moderator')->group(function() {
    Route::get('/moderator', [App\Http\Controllers\Admin\ModeratorController::class,'index'])->name('moderator');
});


//Route::resource('/files',\App\Http\Controllers\FileController::class);
Route::get('/files/index',[\App\Http\Controllers\FileController::class,'index'])->name('freelacerProfile');
Route::get('freelancer/offers',[\App\Http\Controllers\FreelancerController::CLASS,'index'])->name('offersFreelancer');

Route::resource('/offers',\App\Http\Controllers\OffersController::class);
Route::get('/search',[OffersController::class,'search'])->name('search');
Route::post('/offers/filter', [OffersController::class,'filter'])->name('filter');
//Route::get('/{category?}', [OffersController::class,'filter'])->name('filter');
Route::get('freelancer/createoffers',[\App\Http\Controllers\OffersController::CLASS,'create'])->name('createoffers');

Route::post('/saveoffers',[\App\Http\Controllers\OffersController::CLASS,'store'])->name('saveoffers');

//Route::get('/offer_photo_upload', [\App\Http\Controllers\OffersController::CLASS, 'createForm']);
//Route::post('/offer_photo_upload', [\App\Http\Controllers\OffersController::CLASS, 'photoUpload'])->name('photoUpload');

Route::post('freelancer/editoffer',[\App\Http\Controllers\OffersController::CLASS,'update'])->name('editoffers');
Route::get('profile/change_password',[\App\Http\Controllers\HomeController::CLASS,'showChangePasswordForm'])->name('showChangePasswordForm');
Route::post('/change_password',[\App\Http\Controllers\HomeController::CLASS,'changePassword'])->name('changePassword');
Route::get('/profile/edit',[\App\Http\Controllers\HomeController::CLASS,'EditProfile']);
Route::post('/profile',[\App\Http\Controllers\HomeController::CLASS,'Edit'])->name('Edit');
//Route::resource('/profile',\App\Http\Controllers\HomeController::class);
Route::post('/users/{{ $offers->id }}/offershow',[\App\Http\Controllers\OffersController::CLASS,'show'])->name('show');

Route::get('/schedule/index',[\App\Http\Controllers\ScheduleController::CLASS,'index'])->name('schedule');
Route::get('/freelancer/freelancerslist',[\App\Http\Controllers\FreelancerController::CLASS,'allFreelancers'])->name('freelancers');

//Route::resource('/freelancers',\App\Http\Controllers\FreelancerController::class);
Route::get('/freelancer/{id}/freelancerInfoView', [App\Http\Controllers\FreelancerController::class,'showFreelancerProfile'])->name('showFreelancerProfile');
Route::get('/schedule/{id}/addTime',[\App\Http\Controllers\ScheduleController::class,'openAddTime']);
Route::post('/schedule/index',[\App\Http\Controllers\ScheduleController::class,'store'])->name('addTime');
//Route::post('/schedule/{{ $time->id }}',[\App\Http\Controllers\ScheduleController::class,'destroy']);
Route::resource('/schedule',\App\Http\Controllers\ScheduleController::class);
Route::resource('/orders',OrderController::class);
Route::get('/order/{id}/create',[OrderController::class,'create'])->name('orderForm');
Route::post('/order/{id}',[OrderController::CLASS,'store'])->name('saveorder');
//Route::post('/show',[OrderController::class,'show'])->name('showOrders');

//Paslaugų palyginimui
Route::resource('/comparison',\App\Http\Controllers\ComparisonController::class);
//Route::get('/comparison',[\App\Http\Controllers\ComparisonController::class,'index']);
Route::post('/comparison',[\App\Http\Controllers\ComparisonController::class,'store'])->name('compare');
//Route::post('/comparison/cancel',[\App\Http\Controllers\ComparisonController::class,'destroy'])->name('destroy');
Route::get('/freelancerorders',[FreelancerController::class,'freelancerorders'])->name('freelancerorders');
Route::resource('/projects',\App\Http\Controllers\ProjectController::class);
Route::post('/projects',[\App\Http\Controllers\ProjectController::class,'store'])->name('includeprojecct');
