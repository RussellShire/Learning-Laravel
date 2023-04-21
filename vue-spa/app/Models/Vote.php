<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image()
    {
        return $this->hasMany(Image::class, 'image_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
