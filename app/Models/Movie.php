<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Retrieve the static list of movies
    public static function getMovies()
    {
        return [
            [
                'id' => 1,
                'title' => 'Tombstone',
                'year' => '1993'
            ],
            [
                'id' => 2,
                'title' => 'Last Samurai',
                'year' => '2004'
            ],
            [
                'id' => 3,
                'title' => 'The Matrix',
                'year' => '2000'
            ]
        ];
    }

    // Find a movie by its ID
    public static function find(int $id)
    {
        // Get the list of movies
        $movies = self::getMovies();

        // Find and return the movie
        return collect($movies)->firstWhere('id', $id);
    }
}