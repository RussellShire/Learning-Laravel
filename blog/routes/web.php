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
        $files = File::files(resource_path("posts/"));

//      Laravel collect method
        $posts = collect($files)
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            });

        //Other options below

//      Build posts using array map
//        $posts = array_map(function($file) {
//            $document = YamlFrontMatter::parseFile($file);
//
//            return new Post(
//                $document->title,
//                $document->excerpt,
//                $document->date,
//                $document->body(),
//                $document->slug
//            );
//        }, $files);

//      Building posts using foreach
//      $posts = [];
//      foreach ($files as $file) {
//            $document = YamlFrontMatter::parseFile($file);
//
//            $posts[] = new Post(
//                $document->title,
//                $document->excerpt,
//                $document->date,
//                $document->body(),
//                $document->slug
//            );
//        }

    return view('posts', [
       'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($slug) {        // {post} here is a wildcard that can be passed into the function as the argument $slug
    return view('post', [                           // sending the contents of the post file to the view called post, to be rendered
        'post' => Post::find($slug)                      // post = Post class, find = method on the Post class (this moves the logic from the Controller (here) to the Model).
    ]);
})->where('post', '[A-z_\-]+');           // performing regex on our wildcard (defined after 'get') to stop crazy things being passed in;
