<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    {{-- Hero Section --}}
    <div class="hero relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/banner.png') }}');">
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/70"></div>

        {{-- Content --}}
        <div class="relative z-10 text-center text-white flex flex-col justify-center items-center h-full">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Welcome to the Classic Movie Library</h1>
            <p class="text-lg md:text-xl mb-6">Discover timeless films and start your journey today.</p>
            <a href="/movies"
                class="py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-lg font-semibold">Browse
                Movies</a>
        </div>
    </div>
</x-layout>
