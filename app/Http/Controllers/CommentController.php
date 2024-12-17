<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:500',
            'movie_id' => 'required|exists:movies,id'
        ]);

        Comment::create([
            'content' => $validated['content'],
            'movie_id' => $validated['movie_id'],
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }
}
