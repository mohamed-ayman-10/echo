<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Api\Front\AuthController;

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
// Callback
Route::get('callback', [PaymentController::class, 'callback']);

// Auth
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth Jwt
Route::middleware('jwt.verify', 'lang')->group(function () {

    //Payment
    Route::post('payment', [PaymentController::class, 'payment']);

    // Auth
    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });

    Route::controller(HomeController::class)->group(function () {
        // Car Sizes
        Route::post('carSizes', 'carSize');

        // Services
        Route::post('services', 'services');
        Route::post('services/{car_size_id}', 'servicesByCarSizeId');

        // Get Cars
        Route::post('getCar', 'getCar');
        // Create Car
        Route::post('createCar', 'createCar');
        // Update Car
        Route::post('updateCar', 'updateCar');
        // Delete Car
        Route::post('deleteCar', 'deleteCar');
        // Brand
        Route::get('brand', 'brand');
    });

    Route::post('offers', [DiscountController::class, 'offers']);
});
