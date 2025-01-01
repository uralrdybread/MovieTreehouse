<x-layout>
    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data" class="space-y-12"
        id="movie-form">
        @csrf
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold text-gray-900">Add a New Movie</h2>
            <p class="mt-1 text-sm text-gray-600">Provide details about the movie you wish to add.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <!-- TMDB ID -->
                <div class="sm:col-span-4">
                    <label for="tmdb_id" class="block text-sm font-medium text-gray-900">TMDB ID</label>
                    <div class="mt-2">
                        <input type="text" name="tmdb_id" id="tmdb_id"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm"
                            placeholder="e.g., 550 (for Fight Club)">
                    </div>
                    <p class="mt-2 text-sm text-gray-600">Enter the TMDB ID to auto-fill movie details.</p>
                </div>

                <!-- Movie Title -->
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm font-medium text-gray-900">Movie Title</label>
                    <div class="mt-2">
                        <input type="text" name="title" id="title"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm"
                            placeholder="e.g., The Godfather" required>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-span-full">
                    <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea name="description" id="description" rows="3"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm"
                            placeholder="Write a short summary of the movie." required></textarea>
                    </div>
                </div>

                <!-- Release Date -->
                <div class="sm:col-span-2">
                    <label for="release_year" class="block text-sm font-medium text-gray-900">Release Year</label>
                    <div class="mt-2">
                        <select name="release_year" id="release_year"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 focus:outline-indigo-600 sm:text-sm"
                            required>
                            @for ($year = date('Y'); $year >= 1900; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Genre -->
                <div class="sm:col-span-4">
                    <label for="genre" class="block text-sm font-medium text-gray-900">Genre</label>
                    <div class="mt-2">
                        <input type="text" name="genre" id="genre"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm"
                            placeholder="e.g., Drama, Action, Comedy" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('movies.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-indigo-600 focus:outline-offset-2">
                Save
            </button>
        </div>
    </form>

    <script>
        document.getElementById('tmdb_id').addEventListener('change', async function() {
            const tmdbId = this.value;
            if (!tmdbId) return;

            try {
                const response = await fetch(`/api/tmdb/${tmdbId}`);
                if (response.ok) {
                    const movie = await response.json();

                    document.getElementById('title').value = movie.title || '';
                    document.getElementById('description').value = movie.description || '';
                    document.getElementById('release_year').value = movie.release_date ? new Date(movie
                        .release_date).getFullYear() : '';
                    document.getElementById('genre').value = movie.genres ? movie.genres.map(genre => genre
                        .name).join(', ') : '';
                } else {
                    alert('Failed to fetch movie details. Please check the TMDB ID.');
                }
            } catch (error) {
                alert('Error fetching movie details. Please try again.');
            }
        });
    </script>
</x-layout>
