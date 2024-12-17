<x-layout>

    <x-slot:heading>
        Movies
    </x-slot:heading>

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
