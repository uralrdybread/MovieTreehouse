<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\TMDbService;

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
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'rating' => 'required|in:G,PG,PG-13,R,NC-17',
        //     'release_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        //     'genre' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'status' => 'required|in:available,checked out',
        //     'stars' => 'nullable|integer|min:1|max:5',
        // ]);

        // Movie::create($validated);

        // return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
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

    protected $tmdbService;

    // Inject the TMDbService into the controller
    public function __construct(TMDbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    // Show movie poster
    public function showMoviePoster($movieName)
    {
        // Use the searchMovies method of the TMDbService
        $movies = $this->tmdbService->searchMovies($movieName);

        // Check if any movie was found
        if (isset($movies['results'][0])) {
            $movie = $movies['results'][0];
            $posterUrl = $this->tmdbService->getPosterUrl($movie['poster_path']);
            return view('movie-poster', ['posterUrl' => $posterUrl, 'movie' => $movie]);
        }

        return view('movie-poster', ['posterUrl' => null, 'movie' => null]);
    }


    // Create movie API logic
    public function fetchMovieData(Request $request, TMDbService $tmdbService)
{
    $title = $request->query('title');
    $movies = $tmdbService->searchMovies($title);

    if (isset($movies['results'][0])) {
        $movie = $movies['results'][0];
        return response()->json([
            'success' => true,
            'rating' => $movie['vote_average'] ?? null,
            'release_year' => substr($movie['release_date'], 0, 4) ?? null,
            'genre' => implode(', ', array_column($movie['genre_ids'] ?? [], 'name')) ?? null,
            'description' => $movie['overview'] ?? null,
            'poster_url' => $tmdbService->getPosterUrl($movie['poster_path']) ?? null,
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Movie not found']);
}
}