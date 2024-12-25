<x-layout>
    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data" class="space-y-12">
        @csrf
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold text-gray-900">Add a New Movie</h2>
            <p class="mt-1 text-sm text-gray-600">Provide details about the movie you wish to add.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
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
                    <p class="mt-3 text-sm text-gray-600">Keep it brief and engaging.</p>
                </div>

                <!-- Release Date -->
                <div class="sm:col-span-2">
                    <label for="release_date" class="block text-sm font-medium text-gray-900">Release Date</label>
                    <div class="mt-2">
                        <input type="date" name="release_date" id="release_date"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 focus:outline-indigo-600 sm:text-sm"
                            required>
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

                <!-- Rating -->
                <div class="sm:col-span-2">
                    <label for="rating" class="block text-sm font-medium text-gray-900">Rating</label>
                    <div class="mt-2">
                        <input type="number" name="rating" id="rating"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-gray-900 outline outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-indigo-600 sm:text-sm"
                            placeholder="e.g., 8.5" step="0.1" min="0" max="10" required>
                    </div>
                </div>

                <!-- Poster -->
                <div class="col-span-full">
                    <label for="poster" class="block text-sm font-medium text-gray-900">Poster</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 16l4-4a4 4 0 016 0l4-4a4 4 0 110 6l-4 4a4 4 0 01-6 0l-4 4"></path>
                            </svg>
                            <div class="mt-4 flex text-sm text-gray-600">
                                <label for="poster-upload"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="poster-upload" name="poster" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
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
</x-layout>
