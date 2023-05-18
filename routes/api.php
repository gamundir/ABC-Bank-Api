<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneNumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('addresses', AddressController::class);
Route::apiResource('phonenumbers', PhoneNumberController::class);
Route::apiResource('contacts', ContactController::class);
Route::get('search', [ContactController::class, 'search']);
Route::get('ageRange', [ContactController::class, 'ageRange']);
