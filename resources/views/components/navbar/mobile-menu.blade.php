<div class="md:hidden" id="mobile-menu">
    <div class="space-y-2 px-3 pb-4 pt-3 sm:px-4">
        <!-- Home link with active state -->
        <x-mobile-nav-link href="/" :active="request()->is('/')">Home</x-mobile-nav-link>
        <x-mobile-nav-link href="{{ route('movies.index') }}" :active="request()->is('movies*')">Movies</x-mobile-nav-link>
        <x-mobile-nav-link href="/about" :active="request()->is('about')">About</x-mobile-nav-link>
        <x-mobile-nav-link href="/find" :active="request()->is('find')">Find</x-mobile-nav-link>
        <x-mobile-nav-link href="/support" :active="request()->is('support')">Support</x-mobile-nav-link>
    </div>

    <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
            <div class="shrink-0">
                <svg class="h-10 w-10 rounded-full bg-gray-500 text-white flex items-center justify-center">
                    <text x="50%" y="50%" dy=".3em" text-anchor="middle" font-size="10"
                        fill="white">avatar</text>
                </svg>
            </div>
            @if (Auth::check())
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ Auth::user()->username }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <button type="button"
                    class="relative ml-auto shrink-0 rounded-full bg-green-500 p-1 text-gray-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-700">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>
            @else
                <div class="ml-3">
                    <div class="text-sm font-medium text-gray-400">
                        <a href="{{ route('login') }}" class="text-green-500 hover:underline">Log in</a>
                        or
                        <a href="{{ route('register') }}" class="text-green-500 hover:underline">Register</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
