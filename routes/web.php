<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Movie;

Route::get('/', function () {
    return view('home');
});

Route::get('/movies', function () {
    return view('movies', [
        'movies' => Movie::getMovies() // Retrieve all movies
    ]);
});

Route::get('/movies/{id}', function ($id) {
    // Cast $id to an integer
    $movie = Movie::find((int) $id); 

    // Handle movie not found
    if (!$movie) {
        abort(404, 'Movie not found');
    }

    return view('movie', ['movie' => $movie]); // Pass the movie to the view
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';