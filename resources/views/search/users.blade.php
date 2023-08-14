<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('検索結果 ' . $allCount . ' 件') }}
            </h2>
            <div class="flex flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                <div class="flex items-center gap-6 px-4 sm:px-6 lg:px-8 w-full" x-data="{ activeRole: '{{ request('role', \Constant::USER_LIST['agt']) }}'">
                    <div class="flex-1 flex gap-x-6 text-sm leading-6 sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7" x-data="{ activeRole: '{{ request('role', \Constant::USER_LIST['all']) }}' }">
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['all'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['all'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            全て
                            <span class="ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['all'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $allCount }}</span>
                        </a>
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['agt'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['agt'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            AGT
                            <span class="ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['agt'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $agtCount }}</span>
                        </a>
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['ald'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['ald'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            ALD
                            <span class=" ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['ald'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $aldCount }}</span>
                        </a>
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['ld'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['ld'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            LD
                            <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['ld'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $ldCount }}</span>
                        </a>
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['sv'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['sv'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            SV
                            <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['sv'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $svCount }}</span>
                        </a>
                        <a href="{{ route('search.index', ['role' => \Constant::USER_LIST['mgr'], 'search_word' => request('search_word'), 'search_target' => request('search_target')]) }}" :class="activeRole === '{{ \Constant::USER_LIST['mgr'] }}' ? 'text-indigo-600' : 'text-gray-700'">
                            MGR
                            <span class="bg-gray-100 text-gray-900 ml-1 hidden rounded-full py-0.5 px-2.5 text-xs font-medium md:inline-block" :class="activeRole === '{{ \Constant::USER_LIST['mgr'] }}' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900'">{{ $mgrCount }}</span>
                        </a>
                    </div>
                </div>
            </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                @if ($users->count())
                    @foreach ($users as $user)
                        @livewire('follower.user-list', ['user' => $user], key($user->id))
                    @endforeach
                    <div class="bg-white px-4 pt-4 pb-6 sm:px-6">
                        {{ $users->links('vendor.livewire.tailwind2') }}
                    </div>
                @else
                    <div class="py-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286M30 14a6 6 0 11-12 0 6 6 0 0112 0zm12 6a4 4 0 11-8 0 4 4 0 018 0zm-28 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h2 class="mt-2 text-lg font-semibold leading-6 text-gray-900">ユーザーが存在しません</h2>
                        <p class="mt-1 text-sm text-gray-500">別のキーワードで検索してください。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
