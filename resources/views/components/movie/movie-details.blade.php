<div class="rounded-lg shadow-md bg-white p-3">
    <div class="flex justify-between items-center">
        <a class="block p-4 text-blue-700" href="{{ route('movies.index') }}">
            <i class="fa fa-arrow-alt-circle-left"></i>
            Back To Listings
        </a>
        @if ($movie->status !== 'checked out')
            <form action="{{ route('movies.borrow', $movie->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Borrow Movie
                </button>
            </form>
        @else
            <p class="text-danger">This movie is currently checked out.</p>
        @endif
        <div class="flex space-x-3 ml-4">
            <a href="/edit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
            <!-- Delete Form For Admin -->
            <form method="POST">
                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                    Delete
                </button>
            </form>
            <!-- End Delete Form For Admin -->
        </div>
    </div>
    <div class="p-4">
        <h2 class="text-xl font-semibold">
            {{ $movie->title }}
        </h2>
        <p class="text-gray-700 text-lg mt-2">
            {{ $movie->description }}
        </p>
        <ul class="my-4 bg-gray-100 p-4">
            <li class="mb-2">
                <strong>Director: </strong> {{ $movie->director }}
            </li>
            <li class="mb-2">
                <strong>Rating: </strong> {{ $movie->rating }}
            </li>
            <li class="mb-2">
                <strong>Genre: </strong> {{ $movie->genre }}
            </li>
            <li class="mb-2">
                <strong>Status: </strong> {{ $movie->status }}
            </li>
            <li class="mb-2">
                <strong>Stars: </strong>
            </li>
        </ul>
    </div>
</div>
