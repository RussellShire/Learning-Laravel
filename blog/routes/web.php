<?php

use \App\Models\Post;
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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {        // {post} here is a wildcard that can be passed into the function as the argument $slug
    return view('post', [                           // sending the contents of the post file to the view called post, to be rendered
        'post' => Post::find($slug)                      // post = Post class, find = method on the Post class (this moves the logic from the Controller (here) to the Model).
    ]);
})->where('post', '[A-z_\-]+');           // performing regex on our wildcard (defined after 'get') to stop crazy things being passed in;
