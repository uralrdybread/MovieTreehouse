<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\TMDbService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(5);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }


        public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'genre' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'poster' => 'nullable|file|image|max:10240', // 10MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Handle file upload
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        // Create the movie
        $movie = Movie::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'release_year' => $request->input('release_year'),
        'genre' => $request->input('genre'),
        'rating' => $request->input('rating'),
        'poster_path' => $posterPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie created successfully!',
            'data' => $movie,
        ], 201);
    }

    public function show(Movie $movie)
    {
        $movie->load('comments.user');
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        // return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'rating' => 'required|in:G,PG,PG-13,R,NC-17',
        //     'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        //     'genre' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'status' => 'required|in:available,checked out',
        //     'stars' => 'nullable|integer|min:1|max:5',
        // ]);

        // $movie->update($validated);

        // return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        // $movie->delete();

        // return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }

    
    public function fetchTMDB(Request $request)
{
    $tmdbId = $request->input('tmdb_id');
    $apiKey = config('services.tmdb.api_key');
    $url = "https://api.themoviedb.org/3/movie/{$tmdbId}?api_key={$apiKey}";

    $response = Http::get($url);

    if ($response->successful()) {
        $movieData = $response->json();
        return response()->json([
            'title' => $movieData['title'] ?? '',
            'description' => $movieData['overview'] ?? '',
            'release_date' => $movieData['release_date'] ?? '',
            'genres' => $movieData['genres'] ?? []
        ]);
    } else {
        return response()->json(['error' => 'Failed to fetch movie details. Please check the TMDB ID.'], 400);
    }
}
    
    
};