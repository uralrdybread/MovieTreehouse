<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Welcome Section -->
                    <div class="welcome-section bg-gray-50 p-6 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-4">
                            <!-- Placeholder Avatar -->
                            <img src="https://via.placeholder.com/150" alt="[Username] Avatar"
                                class="w-16 h-16 rounded-full object-cover">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-800">Welcome back,
                                    {{ Auth::user()->username }}</h1>
                                <p class="text-gray-500">Movies Favorited: [Count] | Reviews Written: [Count] |
                                    Watchlist: [Count]</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="/profile/edit" class="text-blue-600 hover:underline">Edit Profile</a>
                        </div>
                    </div>

                    <!-- Recent Activity Section -->
                    <div class="recent-activity bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h2>
                        <ul class="space-y-2">
                            <li class="text-gray-700">Reviewed <a href="/movies/1"
                                    class="text-blue-600 hover:underline">Inception</a>: ⭐⭐⭐⭐⭐</li>
                            <li class="text-gray-700">Added <a href="/movies/2"
                                    class="text-blue-600 hover:underline">The
                                    Matrix</a> to favorites.</li>
                        </ul>
                    </div>

                    <!-- Quick Actions Section -->
                    <div class="quick-actions bg-gray-50 p-6 rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
                        <div class="space-y-4">
                            <button
                                class="w-full py-2 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none">Browse
                                Movies</button>
                            <button
                                class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none">Write
                                a Review</button>
                        </div>
                    </div>
                </div>

                <!-- Recommendations Section -->
                <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recommended for You</h2>
                    <ul class="space-y-2">
                        <li><a href="/movies/3" class="text-blue-600 hover:underline">Blade Runner</a></li>
                        <li><a href="/movies/4" class="text-blue-600 hover:underline">Interstellar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>
