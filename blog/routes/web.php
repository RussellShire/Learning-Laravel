<?php

use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
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
    $posts = Post::latest();

    if(request('search')) {
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
//        'posts' => $posts->with('category', 'author')->get(), // Querying all posts, then Eager loading 'category' and 'author' to avoid n+1 SQL queries
        'posts' => $posts->get(), // Querying all posts, then Eager loading 'category' and 'author' to avoid n+1 SQL queries
        'categories' => Category::all(),
    ]);
})->name('home'); // Naming a route

// Route Model binding
Route::get('posts/{post:slug}', function (Post $post) {       // {post} here is a wildcard that gets passed into the function effectively as id, ':slug' grabs one of the attributes on the object
    return view('post', [                                   // sending the contents of the post file to the view called post, to be rendered
        'post' => $post,                                        // $post = id of the Post Model
    ]);
});

Route::get('category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']), // Eager loading inline to avoid N+1 sql queries
        'categories' => Category::all(),
        'currentCategory' => $category,
    ]);
})->name('category'); // Naming a route

Route::get('author/{author:userName}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all(),
    ]);
});
