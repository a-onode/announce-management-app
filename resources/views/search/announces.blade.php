<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('検索結果') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($announces as $announce)
                @livewire('announce.show', ['announce' => $announce], key($announce->id))
            @endforeach
        </div>
    </div>
</x-app-layout>
