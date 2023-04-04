<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%'); // concat '%' means that it allows characters before and after
        };
    }
}
