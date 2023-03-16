<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),   // filter() is a scoped query set on the Post Model
            'categories' => Category::all(),                                // request(['search']) is getting the GET request as an array split down by name, search in this case
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [   // sending the contents of the post file to the view called post, to be rendered
            'post' => $post,        // $post = id of the Post Model
        ]);
    }
}
