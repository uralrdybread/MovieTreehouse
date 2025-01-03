<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Movie extends Model
{
    use HasFactory;

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

     const STATUS_AVAILABLE = 'available';
    const STATUS_BORROWED = 'borrowed';

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relationship to get the users who borrowed the movie
    public function borrowedBy()
    {
        return $this->belongsToMany(User::class, 'borrowed_movies')
                    ->withPivot('borrowed_at', 'returned_at')
                    ->withTimestamps();
    }
}