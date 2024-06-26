<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール編集') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                <div class="p-10 bg-white border-b border-gray-200">

                    @livewire('user.edit', ['user' => $user])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
