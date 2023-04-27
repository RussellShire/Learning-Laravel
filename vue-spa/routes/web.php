<?php

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

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

// store votes
Route::post('/vote', [VoteController::class, 'store']);
// needs middleware
// form needs auth, currently hardcoded as user_id 1

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*'); // Allows literally anything, so /blah/blah is possible
