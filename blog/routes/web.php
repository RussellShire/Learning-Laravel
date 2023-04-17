<?php

use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\RegisterController;
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

Route::get('/', [PostController::class, 'index'])                          // Using a method on a Controller
    ->name('home');                                                     // Naming a route

Route::get('posts/{post:slug}', [PostController::class, 'show']);       // {post} here is a wildcard that gets passed into the function effectively as id
                                                                           // ':slug' grabs one of the attributes on the object

Route::get('author/{author:userName}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts->load(['category', 'author']),
    ]);
});

Route::get('register', [RegisterController::class, 'create']);
