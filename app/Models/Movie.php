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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected $casts = [
    'pivot.borrowed_at' => 'datetime',
    'pivot.returned_at' => 'datetime',
];

    public function borrowedBy()
    {
        return $this->belongsToMany(User::class, 'borrowed_movies') // Correct table name
                    ->withPivot('borrowed_at', 'returned_at')
                    ->withTimestamps();
    }

    
}