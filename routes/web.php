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

Route::get('/user_loc_details', [UserController::class, 'user_loc_details'])->name('user.ip_location_details');

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
Route::post('/linkdocument_ajax', [LinkDocumentsController::class, 'linkdocument_ajax'])->name('linkdocument_ajax');
Route::post('/linkdocument_insert', [LinkDocumentsController::class, 'linkdocument_insert'])->name('linkdocument_insert');


//end add link doc to ser routes

//report routes
Route::get('/reports', [ReportsController::class, 'reports'])->name('reports');
Route::post('/reports_ajax', [ReportsController::class, 'reports_ajax'])->name('reports_ajax');
Route::get('/reports_edit/{service_id}/{sub_service_id} ', [ReportsController::class, 'edit'])->name('reports_edit');
Route::post('/reports_delete', [ReportsController::class, 'reports_delete'])->name('reports_delete');

//end report routes
// end Admin routes
});

