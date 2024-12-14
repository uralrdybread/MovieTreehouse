@props(['movie'])

<div class="rounded-lg shadow-md bg-white p-4 flex flex-col justify-between h-full">
    <!-- Movie Header -->
    <div>
        <div class="flex items-center space-between gap-4">
            <img src="/images/logos/logo-algorix.png" alt="" class="w-14" />
            <div>
                <h2 class="text-xl font-semibold">
                    {{ $movie->title }}
                </h2>
                <p class="text-sm text-gray-500">{{ $movie->genre }}</p>
            </div>
        </div>
        <p class="text-gray-700 text-lg mt-2">
            {{ Str::limit($movie->description, 100, '...') }}
        </p>
        <ul class="my-4 bg-gray-100 p-4 rounded">
            <li class="mb-2"><strong>Director: </strong>{{ $movie->director }}</li>
            <li class="mb-2">
                <strong>Release Year: </strong>{{ $movie->release_year }}
            </li>
            <li class="mb-2">
                <strong>Rating: </strong> <span>{{ $movie->rating }}</span>
            </li>
            <li class="mb-2"><strong>Available: </strong>{{ $movie->status }}</li>
        </ul>
    </div>

    <!-- Details Button at the Bottom -->
    <a href="{{ route('movies.show', $movie->id) }}"
        class="block w-full mt-4 text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
        Details
    </a>
</div>
