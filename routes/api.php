<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\NumberPlateController;
use App\Models\NumberPlate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Comparator\NumberComparator;

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



// cars routes
Route::get('cars', [CarController::class, 'index']);
Route::post('cars', [CarController::class, 'store']);
Route::get('cars/{id}', [CarController::class, 'show']);
Route::put('cars/{id}', [CarController::class, 'update']);
Route::delete('cars/{id}', [CarController::class, 'destroy']);
Route::get('cars-with-numberplate', [CarController::class, 'carsWithNumberPlate']);
Route::get('single-car-with-numberplate/{id}', [CarController::class, 'singleCarWitheNumberPlate']);


// number plate routes
Route::get('numberplate', [NumberPlateController::class, 'index']);
Route::post('cars/{carId}/numberplate', [NumberPlateController::class, 'store']);
Route::get('numberplate/{id}', [NumberPlateController::class, 'show']);
Route::put('cars/{carId}/numberplate/{id}', [NumberPlateController::class, 'update']);
Route::delete('numberplate/{id}', [NumberPlate::class, 'destroy']);
Route::get('numberplate-with-car', [NumberPlateController::class, 'numberPlatesWithCars']);
Route::get('single-numberplate-with-car/{id}', [NumberPlateController::class, 'singleNumberplateWithCar']);
