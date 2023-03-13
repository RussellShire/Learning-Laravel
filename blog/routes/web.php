<?php

use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
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
       'posts' => Post::latest('published_at')->with('category', 'author')->get()     // Querying all posts, then performing category method
    ]);
});

// Route Model binding
Route::get('posts/{post:slug}', function (Post $post) {       // {post} here is a wildcard that gets passed into the function effectively as id, ':slug' grabs one of the attributes on the object
    return view('post', [                                   // sending the contents of the post file to the view called post, to be rendered
        'post' => $post                                         // $post = id of the Post Model
    ]);
});

Route::get('category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('author/{author:userName}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
