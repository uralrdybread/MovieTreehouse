<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function borrow(Request $request, $movieId)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to borrow a movie.');
        }

        $movie = Movie::findOrFail($movieId);

        if ($movie->status === 'checked out') {
            return redirect()->back()->with('error', 'This movie is already checked out.');
        }

        Auth::user()->borrowedMovies()->attach($movie, ['borrowed_at' => now()]);
        $movie->update(['status' => 'checked out']);

        return redirect()->back()->with('success', 'Movie borrowed successfully!');
    }

    public function return(Request $request, $movieId)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to return a movie.');
        }

        $movie = Movie::findOrFail($movieId);

        $borrowRecord = Auth::user()->borrowedMovies()->where('movie_id', $movieId)->whereNull('returned_at')->first();

        if (!$borrowRecord) {
            return redirect()->back()->with('error', 'You have not borrowed this movie.');
        }

        Auth::user()->borrowedMovies()->updateExistingPivot($movieId, ['returned_at' => now()]);
        $movie->update(['status' => 'available']);

        return redirect()->back()->with('success', 'Movie returned successfully!');
    }
}