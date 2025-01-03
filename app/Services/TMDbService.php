<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDbService
{
    // Method to fetch movie details from TMDB API
    public function fetchMovieDataById($tmdbId)
    {
        $apiKey = env('TMDB_API_KEY');
        $url = "https://api.themoviedb.org/3/movie/{$tmdbId}?api_key={$apiKey}";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return null; // or handle as you prefer
        }
    }
}