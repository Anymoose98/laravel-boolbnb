<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApartmentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\MessageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 
Route::get('/guest', 'App\Http\Controllers\GuestController@index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', 'App\Http\Controllers\LoggedController@index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "verified"])->group(function(){
    Route::resource('/apartments', ApartmentsController::class);
});

Route::get('/sponsorship/{apartment_id}/create', [SponsorshipController::class, 'create'])->name('sponsorship.create');
Route::post('/sponsorship/{apartment_id}/store', [SponsorshipController::class, 'store'])->name('sponsorship.store');


Route::get('/search', [ApartmentsController::class, 'search']);

Route::get('/autocomplete', [AutocompleteController::class, 'autocomplete']);

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');





require __DIR__.'/auth.php';
