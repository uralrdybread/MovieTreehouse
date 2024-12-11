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
        Schema::create('movie_listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17']);
            $table->string('director');
            $table->date('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_listings');
    }
};
