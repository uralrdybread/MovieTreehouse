<x-layout>

    <x-slot:heading>
        About Page
    </x-slot:heading>

    <ul>

        @foreach ($movies as $movie)
            <li>
                <a href="/movies/{{ $movie['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $movie['title'] }}:</strong> Year of release {{ $movie['year'] }}
                </a>
            </li>
        @endforeach

    </ul>

</x-layout>
