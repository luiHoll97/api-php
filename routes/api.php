<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
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

Route::group([
    'prefix' => 'services'
], function () {
    Route::get('/', [ServicesController::class, 'index']);
    Route::get('/{countryCode}', [ServicesController::class, 'getCountryByCode']);
    Route::post('/', [ServicesController::class, 'addNewOrUpdate']);
});