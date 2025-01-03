<x-layout>
    <x-slot:heading>
        Movie
    </x-slot:heading>
    <section>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <section class="md:col-span-3">
                <x-movie.movie-details :movie="$movie" :movieDetails="$movieDetails" />

                <!-- Check if the movie status is 'available' -->
                @if ($movie->status == 'available')
                    <!-- Show the borrow button only if the movie is available -->
                    <form action="{{ route('movies.borrow', $movie->id) }}" method="POST">
                        @csrf
                    </form>
                @endif

                <div class="container mx-auto p-4">
                    <h2 class="text-xl font-semibold mb-4">The Peanut Gallery</h2>

                    <div class="mt-6 space-y-4">
                        <!-- Loop through comments -->
                        @forelse ($movie->comments as $comment)
                            <x-comment.comment-post :comment="$comment" />
                        @empty
                            <p class="text-gray-600">No comments yet. Be the first to leave one!</p>
                        @endforelse

                        <!-- Leave a Comment Form -->
                        <x-comment.comment-item :movie="$movie" />
                    </div>
                </div>
            </section>

            <x-movie.movie-sidebar />
        </div>
    </section>
</x-layout>
