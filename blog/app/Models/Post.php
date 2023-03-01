<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug) // defining find method used in Routes
    {
        if(! file_exists($path = resource_path("posts/{$slug}.html"))) { // creating a path if a file exists for our Post
            throw new ModelNotFoundException(); // Throwing an exception if not
        }
        //    Returning a file and caching for 20 minutes
        return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
    }
}
