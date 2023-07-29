<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarSizeController;
use App\Http\Controllers\Admin\IncludeController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // Login
    Route::view('login', 'admin.login')->name('login')->middleware('guest:admin');
    Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin')->middleware('guest:admin');

    Route::middleware('auth:admin')->group(function () {
        // Dashboard
        Route::view('/', 'admin.index')->name('index');

        // Users
        Route::controller(UserController::class)->name('users.')->prefix('users')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update', 'update')->name('update');
            Route::get('{id}/destroy', 'destroy')->name('destroy');
        });

        // Car Size
        Route::controller(CarSizeController::class)->name('car-size.')->prefix('car-size')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update', 'update')->name('update');
            Route::get('{id}/destroy', 'destroy')->name('destroy');
        });

        // Services
        Route::controller(ServiceController::class)->name('services.')->prefix('services')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::post('update', 'update')->name('update');
            Route::get('{id}/destroy', 'destroy')->name('destroy');
            // Material
            Route::resource('material', MaterialController::class);

            // Include
            Route::resource('include', IncludeController::class);
        });

        // Brands
        Route::resource('brand', BrandController::class);

        // Models
        Route::resource('model', CarModelController::class);

        // Settings
        Route::controller(SettingController::class)->name('settings.')->prefix('settings')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/storeAndUpdate', 'storeAndUpdate')->name('storeAndUpdate');
        });
    });
});
