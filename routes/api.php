<?php

use App\Http\Controllers\Api\Front\AuthController;
use App\Http\Controllers\Api\HomeController;
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


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// Auth Jwt
Route::middleware('jwt.verify', 'lang')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        // Car Sizes
        Route::post('carSizes', 'carSize');

        // Services
        Route::post('services', 'services');
        Route::post('services/{car_size_id}', 'servicesByCarSizeId');

        // Create Car
        Route::post('createCar', 'createCar');
        // Update Car
        Route::post('updateCar', 'updateCar');
        // Delete Car
        Route::post('deleteCar', 'deleteCar');
    });
});
