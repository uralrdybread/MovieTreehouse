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

    // Check if the movie is already checked out
    if ($movie->status === 'borrowed') {
        return redirect()->back()->with('error', 'This movie is already borrowed.');
    }

    // Attach the user to the movie in the pivot table
    Auth::user()->borrowedMovies()->attach($movie, ['borrowed_at' => now()]);

    // Update the movie's status to 'checked out'
    $movie->update(['status' => 'borrowed']);

    return redirect()->back()->with('success', 'Movie borrowed successfully!');
}

    public function return(Request $request, $movieId)
{
    // Check if the user is logged in
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to return a movie.');
    }

    $movie = Movie::findOrFail($movieId);

    // Find the borrow record for the movie that has not been returned yet
    $borrowRecord = Auth::user()->borrowedMovies()->where('movie_id', $movieId)->whereNull('returned_at')->first();

    // If the user has not borrowed the movie, show an error
    if (!$borrowRecord) {
        return redirect()->back()->with('error', 'You have not borrowed this movie.');
    }

    // Update the pivot table to set the returned_at timestamp
    Auth::user()->borrowedMovies()->updateExistingPivot($movieId, ['returned_at' => now()]);

    // Update the movie status to 'available'
    $movie->update(['status' => 'available']);

    return redirect()->back()->with('success', 'Movie returned successfully!');
    }
}