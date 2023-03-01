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
    return view('posts');
});

Route::get('posts/{post}', function ($slug) { // {post} here is a wildcard that can be passed into the function
//    Find a post by it\'s value and pass it to the view called "post"
    $post = Post::find($slug); // post = Post class, find = method on the Post class (this moves the logic from the controller (here) to the Model).

    return view('post', [ // sending the contents of the post file to the view called post, to be rendered
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+'); // performing regex on our wildcard (defined after 'get') to stop crazy things being passed in;
