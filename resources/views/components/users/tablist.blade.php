<div class="bg-white overflow-hidden sm:rounded-lg">
    <div class="p-6 bg-white">
        <div class="border-b border-gray-200 pb-5 sm:pb-0">
            <div class="mt-3 sm:mt-4">
                <div class="sm:hidden">
                    <label for="current-tab" class="sr-only">選択タブ</label>
                    <select id="current-tab" name="current-tab" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        <option class="" selected>周知</option>
                        <option>コメント</option>
                        <option>メディア</option>
                        <option>お気に入り</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="-mb-px flex justify-evenly space-x-8">
                        <a href="#" data-id="announce" class="tab-btn border-indigo-500 text-indigo-600 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" aria-current="page">周知</a>
                        <a href="#" data-id="comment" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">コメント</a>
                        <a href="#" data-id="media" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">メディア</a>
                        <a href="#" data-id="favorite" class="tab-btn border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">お気に入り</a>
                    </nav>
                </div>
            </div>
        </div>

        <section>
            @foreach ($announces as $announce)
                <div class="bg-white px-4 py-5 sm:px-6">
                    <div class="flex space-x-3">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex justify-between">
                                <div>
                                    <div class="flex pb-1">
                                        <p class="text-sm font-semibold text-gray-900">
                                            <a href="#" class="hover:underline">{{ $announce->user->name }}</a>
                                        </p>
                                        <p class="text-sm text-gray-500 pl-2">
                                            <a href="#" class="hover:underline">{{ $announce->created_at->diffForHumans() }}</a>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-lg text-gray-800">
                                            <a href="{{ route('announces.show', ['announce' => $announce->id]) }}" class="hover:underline">{{ $announce->name }}</a>
                                        </p>
                                    </div>
                                </div>

                                @livewire('dropdown-menu', ['announce' => $announce])
                            </div>

                            <div>
                                <a href="{{ route('announces.show', ['announce' => $announce->id]) }}" class="text-sm text-gray-600">
                                    {{ $announce->text }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </section>

    </div>
</div>
