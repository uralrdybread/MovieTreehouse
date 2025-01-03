<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\TMDbService; // Import the TMDbService

class MovieController extends Controller
{
    protected $tmdbService;

    // Inject TMDbService into the controller's constructor
    public function __construct(TMDbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $movies = Movie::paginate(10); // Fetch paginated movies from the database

        // Add TMDB details without breaking pagination
        $movies->each(function ($movie) {
            $movie->tmdb_details = $this->tmdbService->fetchMovieDataById($movie->tmdb_id);
        });

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        // You can add your validation and store logic here
    }

    public function show(Movie $movie)
    {
        // Fetch TMDB details using the service
        $movieDetails = $this->tmdbService->fetchMovieDataById($movie->tmdb_id);
        $movie->load('comments.user');
        return view('movies.show', compact('movie', 'movieDetails'));
    }

    public function edit(Movie $movie)
    {
        // You can add edit logic here
    }

    public function update(Request $request, Movie $movie)
    {
        // Add update logic here
    }

    public function destroy(Movie $movie)
    {
        // You can add the destroy logic here
    }

    // Removed fetchTMDB logic as it's now handled by the service
}