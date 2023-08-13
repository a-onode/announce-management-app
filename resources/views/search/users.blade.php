<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('検索結果 ' . $users->count() . ' 件') }}
            </h2>
            <div class="flex flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                <div class="flex-1 flex gap-x-8 text-sm leading-6 sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
                    <a href="{{ route('search.index', ['category' => 'all', 'search_word' => request('search_word')]) }}" class="text-indigo-600">全て</a>
                    <a href="{{ route('search.index', ['category' => 'general', 'search_word' => request('search_word')]) }}" class="text-gray-700">全般</a>
                    <a href="{{ route('search.index', ['category' => 'tech', 'search_word' => request('search_word')]) }}" class="text-gray-700">技術</a>
                    <a href="{{ route('search.index', ['category' => 'operation', 'search_word' => request('search_word')]) }}" class="text-gray-700">運用</a>
                    <a href="{{ route('search.index', ['category' => 'office', 'search_word' => request('search_word')]) }}" class="text-gray-700">事務</a>
                </div>
                <a href="#" class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="-ml-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
                    </svg>
                    New invoice
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
    </div>
</x-app-layout>
