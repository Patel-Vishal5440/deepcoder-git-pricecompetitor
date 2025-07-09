<?php

use App\Http\Controllers\ApiFirestoreController;
use App\Http\Controllers\VuestoreController;
use App\Http\Controllers\Api\CompetitorPriceController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'firestore'], function () {
    Route::get('view-all', [ApiFirestoreController::class, 'index']);
    Route::post('/create', [ApiFirestoreController::class, 'store']);
    Route::post('/fileUpload', [ApiFirestoreController::class, 'fileUpload']);
    Route::post('/update/{id}', [ApiFirestoreController::class, 'update']);
    Route::get('/view/{id}', [ApiFirestoreController::class, 'show']);
    Route::get('/delete/{id}', [ApiFirestoreController::class, 'destroy']);
    Route::post('/image-upload', [ApiFirestoreController::class, 'imageUpload']);
    Route::get('search/{search}', [ApiFirestoreController::class, 'search']);
});

Route::group(['prefix' => 'vuestore'], function () {
    Route::get('view-all', [VuestoreController::class, 'index']);
    Route::post('/create', [VuestoreController::class, 'store']);
    Route::post('/fileUpload', [VuestoreController::class, 'fileUpload']);
    Route::post('/update/{id}', [VuestoreController::class, 'update']);
    Route::get('/view/{id}', [VuestoreController::class, 'show']);
    Route::get('/delete/{id}', [VuestoreController::class, 'destroy']);
    Route::post('/image-upload', [VuestoreController::class, 'imageUpload']);
    Route::get('search/{search}', [VuestoreController::class, 'search']);
});

// Competitor Price API Routes
Route::prefix('competitor-prices')->group(function () {
    Route::post('/sync-odoo', [App\Http\Controllers\Api\CompetitorPriceController::class, 'syncWithOdoo']);
    Route::get('/product/{productId}', [App\Http\Controllers\Api\CompetitorPriceController::class, 'getProductCompetitorPrices']);
    Route::post('/update', [App\Http\Controllers\Api\CompetitorPriceController::class, 'updateCompetitorPrice']);
    Route::get('/history/{productId}', [App\Http\Controllers\Api\CompetitorPriceController::class, 'getPriceHistory']);
    Route::get('/alerts', [App\Http\Controllers\Api\CompetitorPriceController::class, 'getPriceAlerts']);
    Route::post('/update-odoo-price', [App\Http\Controllers\Api\CompetitorPriceController::class, 'updateOdooPrice']);
    Route::get('/report', [App\Http\Controllers\Api\CompetitorPriceController::class, 'generateReport']);
    Route::post('/scrape', [App\Http\Controllers\Api\CompetitorPriceController::class, 'scrapePrice']);
    Route::get('/dashboard', [App\Http\Controllers\Api\CompetitorPriceController::class, 'getDashboardData']);
    Route::post('/bulk-update', [App\Http\Controllers\Api\CompetitorPriceController::class, 'bulkUpdatePrices']);
    Route::get('/trends', [App\Http\Controllers\Api\CompetitorPriceController::class, 'getPriceTrends']);
});
