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
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
