<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// Show Create Listing Form
Route::get('/listings/create', [ListingController::class, 'create'])
    ->middleware('auth'); // ensures only logged-in users can access this route

// Store Listing
Route::post('/listings', [ListingController::class, 'store'])
    ->middleware('auth');

// Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])
    ->middleware('auth');

// Edit listing submit
Route::put('/listings/{listing}', [ListingController::class, 'update'])
    ->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])
    ->middleware('auth');

// Show Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])
    ->middleware('auth');

// Show register create form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest'); // Making so logged in users can't register an account

// Create new user
Route::post('/users', [UserController::class, 'store'])
    ->middleware('guest');

// Logout user
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])
    ->name('login') // Naming a route so that authentication middleware can access it and redirect
    ->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Single Listing (needs to be at the bottom so that /listings/create etc will be caught first
Route::get('/listings/{listing}', [ListingController::class, 'show']);


