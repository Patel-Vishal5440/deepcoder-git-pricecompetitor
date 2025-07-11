<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OdooController;

use App\Http\Controllers\ProfileController;

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

//Routes
Route::get('/', [LoginController::class, 'loginForm']);
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboards'], function () {
        Route::get('/social-media', [DashboardController::class, 'index'])->name('dashboards.index');
        Route::get('/business', [DashboardController::class, 'business'])->name('dashboards.business');
        Route::get('/performance', [DashboardController::class, 'performance'])->name('dashboards.performance');
        Route::get('/ecommerce', [DashboardController::class, 'ecommerce'])->name('dashboards.ecommerce');
        Route::get('/crm', [DashboardController::class, 'crm'])->name('dashboards.crm');
        Route::get('/sales', [DashboardController::class, 'sales'])->name('dashboards.sales');
    });
  
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/profile-setting', [ProfileController::class, 'profileSetting'])->name('pages.profileSetting');
    });
    
    // Profile routes
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/edit', [ProfileController::class, 'profileSetting'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::post('/image', [ProfileController::class, 'updateImage'])->name('profile.image');
    });


    Route::group(['prefix' => 'competitor'], function () {
        Route::get('/list', [CompetitorController::class, 'index'])->name('competitor.list');
        Route::get('/new', [CompetitorController::class, 'create'])->name('competitor.create');
        Route::post('/store', [CompetitorController::class, 'store'])->name('competitor.store');
        Route::get('/edit/{id}', [CompetitorController::class, 'edit'])->name('competitor.edit');
        Route::post('/update/{id}', [CompetitorController::class, 'update'])->name('competitor.update');
        Route::post('/delete/{id}', [CompetitorController::class, 'delete'])->name('competitor.delete');
    });

    Route::group(['prefix' => 'price-history'], function () {
        Route::get('/list', [App\Http\Controllers\PriceHistoryController::class, 'index'])->name('price_history.list');
    });

    Route::group(['prefix' => 'odoo'], function () {
        Route::get('/authenticate', [OdooController::class, 'authenticate'])->name('odoo.authenticate');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/list', [ProductController::class, 'index'])->name('products.list');
        Route::post('/add-link', [ProductController::class, 'addLink'])
        ->name('products.addLink');
        Route::post('/update-price', [ProductController::class, 'updatePrice'])
        ->name('products.updatePrice');
        Route::get('/sync-specific', [ProductController::class, 'syncSpecificProduct'])->name('products.sync-specific');
        // Route::get('/sync-products', [ProductController::class, 'syncProducts']);
        Route::get('/sync-products', [ProductController::class, 'syncProducts'])->name('products.syncProducts');
    });

});
Auth::routes();