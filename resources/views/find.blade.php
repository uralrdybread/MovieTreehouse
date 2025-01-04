<x-layout>
    <x-slot:heading>
        Find
    </x-slot:heading>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Find Bellevue Park, Idaho
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Use the map below to locate our little movie library. We're excited to welcome you to visit us!
                </p>
            </div>

            <div class="relative bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
                <!-- Google Map Embed -->
                <div id="map" style="height: 400px;"></div>
            </div>

        </div>
    </div>

    <!-- Google Maps Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps') }}&callback=initMap&v=weekly"
        async></script>

    <script>
        function initMap() {
            // Bellevue Park location (latitude, longitude)
            const parkLocation = {
                lat: 43.6504,
                lng: -113.2801
            };

            // Create the map centered at Bellevue Park
            const map = new google.maps.Map(document.getElementById("map"), {
                center: parkLocation,
                zoom: 14, // Zoom level (higher means closer view)
            });

            // Create a marker for Bellevue Park
            const marker = new google.maps.Marker({
                position: parkLocation,
                map: map,
                title: "Bellevue Park, Idaho"
            });
        }
    </script>

</x-layout>
