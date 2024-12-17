<div class="comment-form mt-6 rounded-lg shadow-md bg-white p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-2">Leave a Comment</h3>

    @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

            <textarea name="content"
                class="w-full p-3 border rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none text-gray-700" rows="3"
                placeholder="Write your comment here..." required></textarea>

            <button type="submit"
                class="block w-full mt-3 px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Submit Comment
            </button>
        </form>
    @else
        <p class="text-gray-600">
            You need to <a href="{{ route('login') }}" class="text-indigo-500 underline">log in</a>
            to leave a comment.
        </p>
    @endauth
</div>
