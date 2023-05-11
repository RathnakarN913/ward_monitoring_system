<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AddServiceController;
use App\Http\Controllers\Admin\AddSubServiceController;
use App\Http\Controllers\Admin\AddDocumentsController;
use App\Http\Controllers\Admin\LinkDocumentsController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\HomeController;

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
    return redirect(url('login'));
});

Route::get('/log-in', function () {
    return redirect(url('login'));
});

//Route::get('/user_loc_details', [UserController::class, 'user_loc_details'])->name('user.ip_location_details');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

//Admin routes
 Route::get('/home', [HomeController::class, 'index'])->name('home');

//add Service routes
Route::get('/service', [AddServiceController::class, 'service'])->name('service');
Route::post('/service/create', [AddServiceController::class, 'create'])->name('service.create');
Route::get('/service/edit/{id}', [AddServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/update', [AddServiceController::class, 'update'])->name('service.update');
Route::post('/service/delete', [AddServiceController::class, 'delete'])->name('service.delete');
//end add service routes

//add sub service routes
Route::get('/subservice', [AddSubServiceController::class, 'subservice'])->name('subservice');
Route::post('/subservice/create', [AddSubServiceController::class, 'create'])->name('subservice.create');
Route::get('/subservice/edit/{id}', [AddSubServiceController::class, 'edit'])->name('subservice.edit');
Route::post('/subservice/update', [AddSubServiceController::class, 'update'])->name('subservice.update');
Route::post('/subservice/delete', [AddSubServiceController::class, 'delete'])->name('subservice.delete');
//end add sub service routes

//add Document routes
Route::get('/documents', [AddDocumentsController::class, 'documents'])->name('documents');
Route::post('/documents/create', [AddDocumentsController::class, 'create'])->name('documents.create');
Route::get('/documents/edit/{id}', [AddDocumentsController::class, 'edit'])->name('documents.edit');
Route::post('/documents/update', [AddDocumentsController::class, 'update'])->name('documents.update');
Route::post('/documents/delete', [AddDocumentsController::class, 'delete'])->name('documents.delete');
//end add Document routes

//add link doc to ser routes
Route::get('/linkdocument', [LinkDocumentsController::class, 'linkdocument'])->name('linkdocument');

//end add link doc to ser routes

//report routes
Route::get('/reports', [ReportsController::class, 'reports'])->name('reports');

//end report routes
// end Admin routes

// Wards routes
Route::get('/wards-home', [UserController::class, 'wardshome'])->name('wardshome');
Route::get('/wards-addmember', [UserController::class, 'wards_add_member'])->name('wards_add_member');
Route::get('/wards-house', [UserController::class, 'wards_house_owner'])->name('wards_house_owner');
Route::get('/wards-family', [UserController::class, 'wards_family_member'])->name('wards_family_member');
Route::get('/wards-enter', [UserController::class, 'wards_enter_service'])->name('wards_enter_service');
Route::get('/wards-reports', [UserController::class, 'wards_reports'])->name('wards_reports');

// end ward routes
});