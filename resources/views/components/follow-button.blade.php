@if ($user->isFollow(Auth::id()))
    <form action="{{ route('followers.destroy', ['follower' => $user->id]) }}" method="post" class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
        @method('DELETE')
        @csrf
        <button type="submit" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <span>フォロー中</span>
        </button>
    </form>
@else
    <form action="{{ route('followers.store') }}" method="post" class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
        <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <span>フォローする</span>
        </button>
    </form>
@endif
