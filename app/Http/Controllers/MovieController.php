<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        // return view('movies.create');
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
}