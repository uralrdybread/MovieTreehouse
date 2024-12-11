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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17']);
            $table->string('title'); // Movie title
            $table->string('director')->nullable(); // Director's name (optional)
            $table->year('release_year')->nullable(); // Release year
            $table->string('genre')->nullable(); // Genre (e.g., Drama, Comedy)
            $table->text('description')->nullable(); // Description of the movie
            $table->enum('status', ['available', 'checked out'])->default('available'); // Availability status
            $table->unsignedTinyInteger('stars')->nullable(); // Optional average rating (e.g., 1-5 scale)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
