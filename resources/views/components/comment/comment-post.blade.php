<div class="rounded-lg shadow-md bg-gray-100 p-4">
    <div class="flex items-center mb-2">
        <div class="w-10 h-10 bg-indigo-300 rounded-full mr-3"></div>
        <div>
            <p class="font-semibold text-gray-800">{{ $comment->user->username }}</p>
            <p class="text-sm text-gray-500">Posted
                {{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
    <p class="text-gray-700">
        {{ $comment->content }}
    </p>
</div>
