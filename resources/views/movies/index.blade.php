<x-layout>
    <x-slot:heading>
        Movies
    </x-slot:heading>

    @auth
        @if (auth()->user()->role === 'admin')
            <div class="mb-4">
                <a href="{{ route('movies.create') }}"
                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">
                    Add New Movie
                </a>
            </div>
        @endif
    @endauth

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @foreach ($movies as $movie)
            @if (isset($movie->tmdb_details))
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie->tmdb_details['poster_path'] }}"
                        alt="{{ $movie->tmdb_details['title'] }}" class="w-full">
                    <div class="p-4">
                        <h2 class="font-bold text-xl">
                            <a href="{{ route('movies.show', $movie->id) }}" class="text-blue-600 hover:underline">
                                {{ $movie->tmdb_details['title'] }}
                            </a>
                        </h2>
                        <p class="text-gray-700 text-sm">{{ $movie->tmdb_details['overview'] }}</p>
                        <p class="text-gray-500 text-sm mt-2">Release Date: {{ $movie->tmdb_details['release_date'] }}
                        </p>
                        <p class="mt-4">
                            <span
                                class="px-2 py-1 rounded text-white {{ $movie->status === 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($movie->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            @else
                <p class="text-red-500">Details not available for this movie.</p>
            @endif
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $movies->links() }}
    </div>
</x-layout>
