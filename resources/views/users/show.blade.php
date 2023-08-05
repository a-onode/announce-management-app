<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="mb-2">
                            <img class="h-32 w-full object-cover lg:h-48" src="{{ asset('storage/images/backgrounds/' . $user->background_image) }}">
                        </div>
                        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                                <div class="flex">
                                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 bg-white" src="{{ asset('storage/images/users/' . $user->profile_image) }}">
                                </div>

                                <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                    <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
                                        <h1 class="truncate text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                                        <x-badge :role="$user->role" />
                                    </div>
                                    <x-follow-button :user="$user" />
                                </div>
                            </div>

                            <div class="px-4 pt-6 sm:px-6">
                                <p class="mt-1 text-sm text-gray-500">{!! nl2br(e($user->introduction)) !!}</p>

                                <dl class="flex pt-4 gap-6">
                                    <a href="{{ route('followers.list', ['follower' => $user->id, 'type' => 'following']) }}" class="flex items-center">
                                        <dd class="text-lg font-semibold tracking-tight pr-2 text-gray-900 hover:underline">{{ $user->follows->count() }}</dd>
                                        <dt class="truncate text-sm font-medium pt-1 text-gray-500">フォロー中</dt>
                                    </a>
                                    <a href="{{ route('followers.list', ['follower' => $user->id, 'type' => 'followed']) }}" class="flex items-center">
                                        <dd class="text-lg font-semibold tracking-tight pr-2 text-gray-900 hover:underline">{{ $user->followers->count() }}</dd>
                                        <dt class="truncate text-sm font-medium pt-1 text-gray-500">フォロワー</dt>
                                    </a>
                                </dl>
                            </div>

                        </div>
                    </div>

                    @livewire('user.tabs', ['user' => $user])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
