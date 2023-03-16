<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $guarded = ['id']; //
    protected $fillable = ['title', 'category_id', 'slug', 'excerpt', 'body']; // Allows mass assigning posts with Post::create(['title' => "my third post", etc etc]), array allows what can be mass assigned

    public function category()
    {
        // Eloquent relationship types: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // Eloquent relationship types: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id'); //specifying a different foriegn key
    }

    public function scopeFilter($query, array $filters) // Creating a query scope, called with Post::filter() (drop the scope when calling this method)
    {
        if($filters['search'] ?? false) {
            $query
                ->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }
    }
}
