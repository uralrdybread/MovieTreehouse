<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDbService
{
    // Store the API key
    protected $apiKey;

    // Constructor to initialize the API key
    public function __construct()
    {
        // Get the TMDb API key from the config
        $this->apiKey = config('services.tmdb.api_key');
    }

    // Method to search for movies
    public function searchMovies($query)
    {
        // Make a request to TMDb's search endpoint
        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => $this->apiKey,
            'query' => $query,
        ]);

        // Return the response as a JSON array
        return $response->json();
    }

    // Method to get the full URL of the movie poster
    public function getPosterUrl($posterPath, $size = 'w500')
    {
        // Construct the URL to the poster image
        return "https://image.tmdb.org/t/p/{$size}{$posterPath}";
    }
}