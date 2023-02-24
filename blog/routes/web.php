<?php

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
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)){
        return redirect('/');
    }

//    Grabbing a file raw
    $post = file_get_contents($path);

//    Grabbing a file and caching for 20minutes
//    $post = cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));

    return view('post', ['post' => $post // creating a variable with a key value pair and passing into a view
    ]);
})->where('post', '[A-z_\-]+'); // performing regex on our wildcard (defined after 'get') to stop crazy things being passed in;
