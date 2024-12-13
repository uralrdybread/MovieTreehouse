<x-layout>
    <x-slot:heading>
        Movie
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $movie['title'] }}</h2>

    <p>
        This movie came out in {{ $movie['year'] }}.
    </p>
</x-layout>
