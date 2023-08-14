<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                <div class="p-6 bg-white border-b border-gray-200">

                    @foreach ($users as $user)
                        @livewire('follower.user-list', ['user' => $user], key($user->id))
                    @endforeach

                    <div class="bg-white px-4 pt-4 sm:px-6">
                        {{ $users->links('vendor.livewire.tailwind2') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
