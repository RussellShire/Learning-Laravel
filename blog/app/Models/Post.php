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
            ));
    }

    public static function find($slug) // defining find method used in Routes
    {
        $posts = static::all(); // static is calling the all method from this Class

        return $posts->firstWhere('slug', $slug); // find the first post from the array where the slug on the post object matches the slug passed in as an argument
    }
}
