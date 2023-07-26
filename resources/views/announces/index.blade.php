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
                    @livewire('announces', ['announce' => $announce])
                @endforeach

                <div class="bg-white px-4 pt-4 pb-6 sm:px-6">
                    {{ $announces->links('vendor.livewire.tailwind2') }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
