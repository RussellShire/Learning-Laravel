<?php

use App\Models\Image;
use App\Models\User;
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

Route::get('example', function() {
    return [
        'dataOne' => 1,
        'dataTwo' => 201,
    ];
});

Route::get('users', function() {
    $users = User::all();

    return $users;
});

Route::get('images', function() {
    $images = Image::all();
    return $images;
});

Route::get('user/{user_id}', function($user_id) {
   $user = User::get()
});

