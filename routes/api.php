<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApartmentsController as ApartmentsController;
use App\Http\Controllers\API\MessageController as MessageController;
use App\Http\Controllers\API\ServiceController as ServiceController;
use App\Http\Controllers\API\PivotApartmentsController;
use App\Http\Controllers\API\PivotTableController;
use App\Http\Controllers\API\ClickController;


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


Route::get('/apartments', [ApartmentsController::class, 'index']);
Route::get("/apartments/{id}", [ApartmentsController::class, "show"]);
Route::get("/service", [ServiceController::class, "index"] );
Route::post('/apartments/{apartment}/clicks', [ClickController::class, 'store']);
Route::resource('/message', MessageController::class);
Route::get('pivot-apartments', [PivotApartmentsController::class, 'index']);









Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
