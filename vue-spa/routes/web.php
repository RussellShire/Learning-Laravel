<?php

use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
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
Route::post('/vote',
    [VoteController::class, 'store']
//    function (Request $request) {
//        dd($request->all());
////        echo "/vote route";
//    }

);
// needs middleware
// form needs auth, currently hardcoded as user_id 1

Route::get('/{any}', function () {
//    echo "hello";
    return view('app');
})->where('any', '.*'); // Allows literally anything, so /blah/blah is possible
