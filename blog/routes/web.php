<?php

use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

// Show index page
Route::get('/', [PostController::class, 'index'])                          // Using a method on a Controller
    ->name('home');                                                     // Naming a route

// Show post page
Route::get('posts/{post:slug}', [PostController::class, 'show']);       // {post} here is a wildcard that gets passed into the function effectively as id
                                                                           // ':slug' grabs one of the attributes on the object

// Show Register user form
Route::get('register', [RegisterController::class, 'create'])
    ->middleware('guest'); // Stops logged-in users using this route

// Store Register user form
Route::post('register', [RegisterController::class, 'store'])
    ->middleware('guest');

// User log in
Route::get('login', [SessionsController::class, 'create'])
    ->middleware('guest'); // Only guests can log in

// Authenticate user login
Route::post('login/authenticate', [SessionsController::class, 'store']);

// User log out
Route::post('logout', [SessionsController::class, 'destroy'])
    ->middleware('auth'); // Only logged in people can log out





// NOTE: This is replaced by the scope filter on the Post Model
// Leaving as an example of filtering
//Route::get('author/{author:userName}', function (User $author) {
//    return view('posts.index', [
//        'posts' => $author->posts->load(['category', 'author']),
//    ]);
//});
