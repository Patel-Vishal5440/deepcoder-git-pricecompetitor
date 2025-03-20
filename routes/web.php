<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\PriceHistoryController;
use App\Http\Controllers\OdooController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/login');
Route::redirect('/login', 'admin/login')->name('login');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest:moderator'], function () {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::get('/login', [AuthController::class, 'login']);
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::group(['middleware' => 'auth:moderator'], function () {

        Route::group(['middleware' => 'check.permission:Moderators'], function () {
            Route::resource('/moderator', ModeratorController::class)->except('show');
            Route::post('/moderator/createOrUpdate/{id?}', [ModeratorController::class, 'createOrUpdate'])
            ->name('moderator.createOrUpdate');
        });

        Route::group(['middleware' => 'check.permission:Product'], function () {
            // Write/manage routes
            Route::resource('/product', ProductController::class);
            Route::get('/scrape/phonelcdparts', [ProductController::class, 'scrape']);
            Route::post('/products/update-price', [ProductController::class, 'updatePrice'])
                ->name('product.updatePrice');

            Route::post('/products/add-link', [ProductController::class, 'addLink'])
                ->name('product.addLink');
        });

        Route::group(['middleware' => 'check.permission:Competitor'], function () {
            Route::resource('/competitor', CompetitorController::class)->except('show');
            Route::post('/competitor/createOrUpdate/{id?}', [CompetitorController::class, 'createOrUpdate'])
                ->name('competitor.createOrUpdate');
        });

        Route::group(['middleware' => 'check.permission:Price History'], function () {
            Route::resource('/price-history', PriceHistoryController::class)->except('show');
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'updateProfile'])->name('update-profile');
            Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
            Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('change-password.post');
        });
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::get('/odoo/authenticate', [OdooController::class, 'authenticate']);

        Route::post('/product/sync-specific', [ProductController::class, 'syncSpecificProduct'])->name('product.sync-specific');
   
        // routes/web.php
        Route::get('/scrape', [ScraperController::class, 'scrape']);

    });
});

