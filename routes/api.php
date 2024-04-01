<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Apartments;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\ApartmentsController as ApartmentsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
