<div class="bg-white overflow-hidden sm:rounded-lg">
    <div class="pt-2 pl-6 pr-6 bg-white">
        <div class="border-b border-gray-200 pb-5 sm:pb-0">
            <div class="mt-3 sm:mt-4">
                <div class="sm:hidden">
                    <label for="current-tab" class="sr-only">選択タブ</label>
                    <select id="current-tab" name="current-tab" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        <option wire:click="setCurrentTab('announce')" @if ($currentTab === 'announce') selected @endif>周知</option>
                        <option wire:click="setCurrentTab('comment')" @if ($currentTab === 'comment') selected @endif>コメント</option>
                        <option wire:click="setCurrentTab('media')" @if ($currentTab === 'media') selected @endif>メディア</option>
                        <option wire:click="setCurrentTab('favorite')" @if ($currentTab === 'favorite') selected @endif>お気に入り</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="-mb-px flex justify-evenly space-x-8">
                        <p wire:click="setCurrentTab('周知')" class="@if ($currentTab === '周知') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium" aria-current="page">周知</p>
                        <p wire:click="setCurrentTab('コメント')" class="@if ($currentTab === 'コメント') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">コメント</p>
                        <p wire:click="setCurrentTab('メディア')" class="@if ($currentTab === 'メディア') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">メディア</p>
                        <p wire:click="setCurrentTab('お気に入り')" class="@if ($currentTab === 'お気に入り') border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">お気に入り</p>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @if ($currentTab === '周知')
        @if ($user->announces)
            @foreach ($user->announces->sortByDesc('created_at') as $announce)
                @livewire('announce.show', ['announce' => $announce], key('announce-show-' . $announce->id))
            @endforeach
        @else
            <x-nothing />
        @endif
    @endif

    @if ($currentTab === 'コメント')
        @if ($user->comments)
            @foreach ($user->comments->sortByDesc('created_at') as $comment)
                @livewire('comment.show', ['comment' => $comment], key('comment-show-' . $comment->id))
            @endforeach
        @endif
    @endif

    @if ($currentTab === 'メディア')
        <x-nothing word="周知" />
    @endif

    @if ($currentTab === 'お気に入り')
        <x-nothing word="お気に入り" />
    @endif
</div>
