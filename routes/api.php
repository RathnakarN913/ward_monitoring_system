<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\BusController;
use App\Http\Controllers\api\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('enquiry-forms', [ApiController::class, 'enquiryForms']);
Route::post('enquiry-forms-post', [ApiController::class, 'enquiryFormsData']);


Route::post('get-bus-data', [BusController::class, 'index']);
Route::post('edit-bus-data', [BusController::class, 'edit_bus']);
Route::post('update-bus-data', [BusController::class, 'update_bus']);
Route::post('update-bus-status', [BusController::class, 'update_bus_status']);
Route::post('check-token-status', [BusController::class, 'check_token_status']);

Route::post('update-bus-reached-data', [BusController::class, 'update_bus_reached_data']);

Route::post('login', [LoginController::class, 'index']);
