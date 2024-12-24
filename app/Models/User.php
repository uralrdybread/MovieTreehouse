<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

        protected $casts = [
    'pivot.borrowed_at' => 'datetime',
    'pivot.returned_at' => 'datetime',
];

    public function borrowedMovies()
    {
        return $this->belongsToMany(Movie::class, 'borrowed_movies') // Correct table name
                    ->withPivot('borrowed_at', 'returned_at')
                    ->withTimestamps();
    }


}