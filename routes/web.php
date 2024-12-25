<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('home');
});

Route::resource('movies', MovieController::class);

Route::post('/movies/{movie}/borrow', [BorrowingController::class, 'borrow'])->name('movies.borrow');
Route::post('/movies/{movie}/return', [BorrowingController::class, 'return'])->name('movies.return');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/find', function () {
    return view('find');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/movie/{movieName}', [MovieController::class, 'showMoviePoster']);


require __DIR__.'/auth.php';