@props(['active' => false])

<a class="{{ $active ? 'bg-green-800 text-white' : 'text-gray-300 hover:bg-green-500 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
    aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>
