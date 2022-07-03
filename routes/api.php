<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
})->middleware('auth');


Route::resource('other_infos', App\Http\Controllers\API\other_infosAPIController::class);


Route::resource('academic_infos', App\Http\Controllers\API\academic_infosAPIController::class);


Route::resource('contact_infos', App\Http\Controllers\API\contact_infosAPIController::class);


Route::resource('appointments', App\Http\Controllers\API\appointmentsAPIController::class);


Route::resource('appointment_categories', App\Http\Controllers\API\appointment_categoryAPIController::class);


Route::resource('categories', App\Http\Controllers\API\categoriesAPIController::class);


Route::resource('guidances', App\Http\Controllers\API\guidancesAPIController::class);


Route::resource('instructors', App\Http\Controllers\API\instructorsAPIController::class);


Route::resource('chats', App\Http\Controllers\API\chatsAPIController::class);


Route::resource('chat_rooms', App\Http\Controllers\API\chat_roomsAPIController::class);


Route::resource('new_features', App\Http\Controllers\API\new_featuresAPIController::class);


Route::resource('announcements', App\Http\Controllers\API\announcementsAPIController::class);


Route::resource('applications', App\Http\Controllers\API\applicationsAPIController::class);
