<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="mb-2">
                            <img class="h-32 w-full object-cover lg:h-48" src="{{ asset('storage/images/background/' . Auth::user()->background_image) }}">
                        </div>

                        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                                <div class="flex">
                                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 bg-white" src="{{ asset('storage/images/user/' . Auth::user()->profile_image) }}">
                                </div>
                                <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                    <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
                                        <h1 class="truncate text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                                        <x-badge :role="Auth::user()->role" />
                                    </div>
                                    <a href="{{ route('users.edit', ['user' => Auth::id()]) }}" class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                                        <button type="button" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                            </svg>
                                            <span>編集する</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="px-4 pt-5 sm:px-6">
                                <p class="mt-1 text-sm text-gray-500">{!! nl2br(e(Auth::user()->introduction)) !!}</p>

                                <dl class="flex pt-4 gap-6">
                                    <a href="{{ route('followers.list', ['follower' => Auth::id(), 'type' => 'following']) }}" class="flex items-center">
                                        <dd class="text-lg font-semibold tracking-tight pr-2 text-gray-900 hover:underline">{{ Auth::user()->follows->count() }}</dd>
                                        <dt class="truncate text-sm font-medium pt-1 text-gray-500">フォロー中</dt>
                                    </a>
                                    <a href="{{ route('followers.list', ['follower' => Auth::id(), 'type' => 'followed']) }}" class="flex items-center">
                                        <dd class="text-lg font-semibold tracking-tight pr-2 text-gray-900 hover:underline">{{ Auth::user()->followers->count() }}</dd>
                                        <dt class="truncate text-sm font-medium pt-1 text-gray-500">フォロワー</dt>
                                    </a>
                                </dl>
                            </div>

                        </div>
                    </div>

                    @livewire('user.tabs', ['user' => Auth::user()])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
