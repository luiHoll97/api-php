<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'services'
], function () {
    Route::get('/', [ServicesController::class, 'index']);
    Route::get('/{countryCode}', [ServicesController::class, 'getCountryByCode']);
    Route::post('/', [ServicesController::class, 'addNewOrUpdate']);
});