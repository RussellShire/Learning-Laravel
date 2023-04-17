<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author']) // filter() is a scoped query set on the Post Model
            )->paginate(6)->withQueryString(),           // using 'paginate' instead of 'get'
            ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [     // sending the contents of the post file to the view called post, to be rendered
            'post' => $post,                // $post = id of the Post Model
        ]);
    }
}
