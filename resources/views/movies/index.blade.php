<x-layout>

    <x-slot:heading>
        Movies
    </x-slot:heading>

    @auth
        @if (auth()->user()->role === 'admin')
            <!-- Check if the user is an admin -->
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
            <x-movie-card :movie="$movie" />
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $movies->links() }}
    </div>

</x-layout>
