<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
//        Caching the posts forever so they aren't reloaded everytime the page refreshes, this means extra work is required to add new posts
        return cache()->rememberForever('posts.all', function () {
//      Laravel Collect method example
            // Using built in File class to get all files from a folder
            return collect(File::files(resource_path("posts/")))

                // Map over the files and create an array of YamlFrontMatter objects with metadata
                ->map(fn($file) => YamlFrontMatter::parseFile($file))

                // Map over the array of Yaml objects and create new Post objects
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date'); // Sorting the collection by a particular value for display
        });
    }

    public static function find($slug) // defining find method used in Routes
    {
        return static::all()->firstWhere('slug', $slug); // static is calling the all method from this Class
    }

    public static function findOrFail($slug) // defining find method used in Routes
    {
        $post = static::find($slug); // static is calling the find method from this Class
        // where finds the first post from the array where the slug on the post object matches the slug passed in as an argument

        if (!$post){ // checking if a user entered an incorrect slug
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
