<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowed_movies', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The user who borrowed the movie
            $table->foreignId('movie_id')->constrained()->onDelete('cascade'); // The borrowed movie
            $table->timestamp('borrowed_at')->nullable(); // Date when the movie was borrowed
            $table->timestamp('returned_at')->nullable(); // Date when the movie was returned
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowed_movies');
    }
};
