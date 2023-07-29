<div class="mt-6 flex gap-x-3">
    <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" class="h-8 w-8 flex-none rounded-md bg-gray-50">

    <form action="{{ route('comments.store') }}" method="post" class="relative flex-auto">
        @csrf

        <div class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
            <label for="comment" class="sr-only"></label>
            <textarea rows="2" name="comment" id="comment" class="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="コメントを追加する"></textarea>
            <input type="hidden" name="announce_id" id="announce_id" value="{{ $announce->id }}">
        </div>

        <div class="absolute inset-x-0 bottom-0 flex justify-end py-2 pl-3 pr-2">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">コメントする</button>
        </div>

    </form>
</div>
