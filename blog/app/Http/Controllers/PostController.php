<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        if(request('search')) {
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            'posts' => $posts->get(), // Querying all posts, then Eager loading 'category' and 'author' to avoid n+1 SQL queries
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [                                   // sending the contents of the post file to the view called post, to be rendered
            'post' => $post,                                        // $post = id of the Post Model
        ]);
    }
}
