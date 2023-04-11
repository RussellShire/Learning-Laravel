<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// All Listings
Route::get('/', [ListingController::class, 'index']); // Calling a specific method on a Controller

// Create Listing
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing
Route::post('/listings', [ListingController::class, 'store']);

// Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Edit listing submit
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Single Listing (needs to be at the bottom so that /listings/create etc will be caught first
Route::get('/listings/{listing}', [ListingController::class, 'show']);
