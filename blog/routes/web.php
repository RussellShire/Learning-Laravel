<?php

use \App\Models\Post;
use Illuminate\Support\Facades\Route;
use \Spatie\YamlFrontMatter\YamlFrontMatter;

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

// Route Model binding
Route::get('posts/{post}', function (Post $post) {        // {post} here is a wildcard that gets passed into the function
    return view('post', [                               // sending the contents of the post file to the view called post, to be rendered
        'post' => $post                                     // $post = id of the Post Model
    ]);
});

// Manually assigning everything
//Route::get('posts/{post}', function ($id) {          // {post} here is a wildcard that can be passed into the function as the argument $id
//    return view('post', [                           // sending the contents of the post file to the view called post, to be rendered
//        'post' => Post::findOrFail($id)            // post = Post class, find = method on the Post class (this moves the logic from the Controller (here) to the Model).
//    ]);
//});
