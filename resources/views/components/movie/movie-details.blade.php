<div class="rounded-lg shadow-md bg-white p-3">
    <!-- Back to Listings -->
    <div class="flex justify-between items-center">
        <a class="block p-4 text-blue-700" href="{{ route('movies.index') }}">
            <i class="fa fa-arrow-alt-circle-left"></i>
            Back To Listings
        </a>

        <!-- Borrow Button or Status -->
        @if ($movie->status === 'available')
            <form action="{{ route('movies.borrow', $movie->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Borrow Movie</button>
            </form>
        @else
            <p>This movie is currently checked out.</p>
        @endif

        <!-- Edit and Delete Buttons (Only for Admins) -->
        @auth
            @if (auth()->user()->role === 'admin')
                <div class="flex space-x-3 ml-4">
                    <a href="{{ route('movies.edit', $movie->id) }}"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                        Edit
                    </a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <!-- Movie Details -->
    <div class="p-4">
        @if (isset($movieDetails))
            <h2 class="text-2xl font-semibold">
                {{ $movieDetails['title'] }}
            </h2>
            <p class="text-gray-700 text-lg mt-2">
                {{ $movieDetails['overview'] }}
            </p>
            <ul class="my-4 bg-gray-100 p-4">
                <li class="mb-2">
                    <strong>Release Date: </strong> {{ $movieDetails['release_date'] }}
                </li>
                <li class="mb-2">
                    <strong>Rating: </strong> {{ $movieDetails['vote_average'] }}/10 ({{ $movieDetails['vote_count'] }}
                    votes)
                </li>
                <li class="mb-2">
                    <strong>Genres: </strong>
                    {{ implode(', ', array_column($movieDetails['genres'], 'name')) }}
                </li>
                <li class="mb-2">
                    <strong>Status: </strong>
                    <span class="{{ $movie->status === 'available' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($movie->status) }}
                    </span>
                </li>
                <li class="mb-2">
                    <strong>Stars: </strong>
                    @if (isset($movieDetails['credits']['cast']))
                        {{ implode(', ', array_slice(array_column($movieDetails['credits']['cast'], 'name'), 0, 5)) }}
                    @else
                        N/A
                    @endif
                </li>
            </ul>

            <!-- Poster -->
            <img src="https://image.tmdb.org/t/p/w500{{ $movieDetails['poster_path'] }}"
                alt="{{ $movieDetails['title'] }}" class="rounded-lg shadow-md mt-4 mx-auto">
        @endif

    </div>
</div>
