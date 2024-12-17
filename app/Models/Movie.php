<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function comments()
{
    return $this->hasMany(Comment::class);
}

    protected $fillable = [
        'rating',
        'title',
        'director',
        'release_year',
        'genre',
        'description',
        'status',
        'stars',
    ];
}