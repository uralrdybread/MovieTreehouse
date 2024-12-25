@props(['movie', 'poster_url'])

<div class="rounded-lg shadow-md bg-white flex flex-col h-full">
    <!-- Movie Poster -->
    <div class="relative h-48 overflow-hidden rounded-t-lg">
        <img src="{{ $poster_url ?? '/images/placeholder-poster.jpg' }}" alt="{{ $movie->title }} Poster"
            class="object-cover w-full h-full" />
    </div>

    <!-- Movie Details -->
    <div class="p-4 flex flex-col justify-between flex-grow">
        <div>
            <!-- Movie Header -->
            <div class="flex items-center space-between gap-4 mb-4">
                <div>
                    <h2 class="text-xl font-semibold">{{ $movie->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $movie->genre }}</p>
                </div>
            </div>

            <!-- Movie Description -->
            <p class="text-gray-700 text-sm mb-4">
                {{ Str::limit($movie->description, 100, '...') }}
            </p>

            <!-- Movie Info List -->
            <ul class="bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>Director: </strong>{{ $movie->director }}</li>
                <li class="mb-2"><strong>Release Year: </strong>{{ $movie->release_year }}</li>
                <li class="mb-2"><strong>Rating: </strong>{{ $movie->rating }}</li>
                <li class="mb-2"><strong>Status: </strong>{{ $movie->status }}</li>
            </ul>
        </div>

        <!-- Details Button -->
        <a href="{{ route('movies.show', $movie->id) }}"
            class="block w-full mt-4 text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
            Details
        </a>
    </div>
</div>
