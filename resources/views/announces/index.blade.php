<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('周知一覧') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

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

                                    <x-dropdown-menu />
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
            </div>
        </div>
    </div>
</x-app-layout>
