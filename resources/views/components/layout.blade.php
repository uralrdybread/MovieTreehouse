<!DOCTYPE html>
<html lang="en" class="h-full" bg-gray-100>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Home Page</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-green-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="h-12 w-auto" src="/images/movietreehouselogotrans.png" alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                <x-nav-link href="{{ route('movies.index') }}" :active="request()->is('movies/index')">Movies</x-nav-link>
                                <x-nav-link href="about" :active="request()->is('about')" type="button">About</x-nav-link>
                                <x-nav-link href="find" :active="request()->is('find')" type="button">Find</x-nav-link>
                                <x-nav-link href="support" :active="request()->is('support')" type="button">Support</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full bg-green-500 p-1 text-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ auth()->user()->avatar ?? 'https://via.placeholder.com/32/cccccc/000000?text=Avatar' }}"
                                            alt="User Avatar">
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--Mobile button component. -->
                    <x-navbar.mobile-button />
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <x-navbar.mobile-menu />
        </nav>

        <header class="bg-gray-100 shadow">
            <div class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">
                <h1 class="text-3xl font-bold tracking-tight text-gray-800">Heading</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">
                {{ $slot }} </div>
        </main>
    </div>


</body>

</html>
