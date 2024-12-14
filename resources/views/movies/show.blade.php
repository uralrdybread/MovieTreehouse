<x-layout>
    <x-slot:heading>
        Movie
    </x-slot:heading>

    <section>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <section class="md:col-span-3">
                <div class="rounded-lg shadow-md bg-white p-3">
                    <div class="flex justify-between items-center">
                        <a class="block p-4 text-blue-700" href="{{ route('movies.index') }}">
                            <i class="fa fa-arrow-alt-circle-left"></i>
                            Back To Listings
                        </a>
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

                <div class="container mx-auto p-4">
                    <h2 class="text-xl font-semibold mb-4">The Peanut Gallery</h2>

                    <!-- Placeholder Comments -->
                    <div class="space-y-4">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="rounded-lg shadow-md bg-gray-100 p-4">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 bg-indigo-300 rounded-full mr-3"></div>
                                    <div>
                                        <p class="font-semibold text-gray-800">User {{ $i + 1 }}</p>
                                        <p class="text-sm text-gray-500">Posted {{ rand(1, 5) }} hours ago</p>
                                    </div>
                                </div>
                                <p class="text-gray-700">
                                    This is a placeholder comment. Replace this section with real comments from your
                                    database.
                                </p>
                            </div>
                        @endfor
                    </div>

                    <!-- Comment Form -->
                    <div class="mt-6 rounded-lg shadow-md bg-white p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Leave a Comment</h3>
                        <form method="POST" action="#">
                            <textarea class="w-full p-3 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none text-gray-700"
                                rows="3" placeholder="Write your comment here..."></textarea>
                            <button type="submit"
                                class="block w-full mt-3 px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Submit Comment
                            </button>
                        </form>
                    </div>
                </div>
            </section>

            <x-movie-sidebar />

</x-layout>
