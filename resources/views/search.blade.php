<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('検索結果') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data="{ activeTab: 'announces' }" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pt-6 pr-6 pb-2 pl-6 bg-white">

                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>
                        <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                            <option>周知</option>
                            <option selected>ユーザ</option>
                        </select>
                    </div>
                    <div class="hidden sm:block sm:border-b sm:border-gray-200">
                        <nav class="flex space-x-4 pb-4" aria-label="Tabs">
                            <a @click.prevent="activeTab = 'announces'" :class="activeTab === 'announces' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'" class="rounded-md px-3 py-2 text-sm font-medium" aria-current="page">周知</a>
                            <a @click.prevent="activeTab = 'users'" :class="activeTab === 'users' ? 'bg-indigo-100 text-indigo-700' : 'text-gray-500 hover:text-gray-700'" class="rounded-md px-3 py-2 text-sm font-medium">ユーザ</a>
                        </nav>
                    </div>

                </div>

                <div x-show="activeTab === 'announces'">
                    @foreach ($announces as $announce)
                        @livewire('announce.show', ['announce' => $announce], key($announce->id))
                    @endforeach

                    <div class="bg-white px-4 pt-4 pb-6 sm:px-6">
                        {{ $announces->links('vendor.livewire.tailwind2') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
