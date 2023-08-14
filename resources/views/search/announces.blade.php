<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-shrink-0">
                {{ __('検索結果 ' . $allCount . ' 件') }}
            </h2>
            <div class="flex items-center gap-6 px-4 sm:px-6 lg:px-8 w-full">
                <div class="flex-1 flex gap-x-6 text-sm leading-6 sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7" x-data="{ activeType: '{{ request('type', \Constant::ANNOUNCE_LIST['all']) }}' }">
                    <a href="{{ route('search.index', ['type' => \Constant::ANNOUNCE_LIST['all'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['all'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                        全て
                        <span class="ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['all'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $allCount }}</span>
                    </a>
                    <a href="{{ route('search.index', ['type' => \Constant::ANNOUNCE_LIST['general'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['general'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                        全般
                        <span class=" ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['general'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $generalCount }}</span>
                    </a>
                    <a href="{{ route('search.index', ['type' => \Constant::ANNOUNCE_LIST['tech'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['tech'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                        技術
                        <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['tech'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $techCount }}</span>
                    </a>
                    <a href="{{ route('search.index', ['type' => \Constant::ANNOUNCE_LIST['operation'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['operation'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                        運用
                        <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['operation'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $operationCount }}</span>
                    </a>
                    <a href="{{ route('search.index', ['type' => \Constant::ANNOUNCE_LIST['office'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['office'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                        庶務
                        <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeType === '{{ \Constant::ANNOUNCE_LIST['office'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $officeCount }}</span>
                    </a>
                </div>
                <form x-ref="submitForm" action="{{ route('search.index') }}" class="ml-auto flex-shrink-0" x-data="{ submit() { $refs.submitForm.submit() } }">
                    <label for="search_target" class="sr-only">Search Target</label>
                    <input type="hidden" id="search_target" name="search_target" value="{{ request('search_target') }}">

                    <label for="type" class="sr-only">Search Target</label>
                    <input type="hidden" id="type" name="type" value="{{ request('type') }}">

                    <label for="search_word" class="sr-only">Search Word</label>
                    <input type="hidden" id="search_word" name="search_word" value="{{ request('search_word') }}">

                    <div class="flex space-x-2">
                        <label for="sort" class="sr-only">Sort</label>
                        <select x-on:change="submit()" id="sort" name="sort" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>新しい順</option>
                            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>古い順</option>
                        </select>
                        <label for="date" class="sr-only">Date</label>
                        <select x-on:change="submit()" id="date" name="date" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="always" {{ request('date') === 'always' ? 'selected' : '' }}>常に</option>
                            <option value="today" {{ request('date') === 'today' ? 'selected' : '' }}>今日</option>
                            <option value="yesterday" {{ request('date') === 'yesterday' ? 'selected' : '' }}>昨日</option>
                            <option value="last_7days" {{ request('date') === 'last_7days' ? 'selected' : '' }}>過去7日間</option>
                            <option value="last_30days" {{ request('date') === 'last_30days' ? 'selected' : '' }}>過去30日間</option>
                            <option value="last_3months" {{ request('date') === 'last_3months' ? 'selected' : '' }}>過去3ヶ月</option>
                            <option value="last_12months" {{ request('date') === 'last_12months' ? 'selected' : '' }}>過去12ヶ月</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                @if ($announces->count())
                    @foreach ($announces as $announce)
                        @livewire('announce.show', ['announce' => $announce], key($announce->id))
                    @endforeach
                    <div class="bg-white px-4 pt-4 pb-6 sm:px-6">
                        {{ $announces->links('vendor.livewire.tailwind2') }}
                    </div>
                @else
                    <div class="py-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h2 class="mt-2 text-lg font-semibold leading-6 text-gray-900">投稿が存在しません</h2>
                        <p class="mt-1 text-sm text-gray-500">別のキーワードで検索してください。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
