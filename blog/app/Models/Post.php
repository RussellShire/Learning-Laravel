<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $guarded = ['id']; //

    protected $fillable = ['title', 'excerpt', 'body']; // Allows mass assigning posts with Post::create(['title' => "my third post", etc etc]), array allows what can be mass assigned
}
