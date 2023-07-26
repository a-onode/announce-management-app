<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $announce->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-flash-message />

                @livewire('announces', ['announce' => $announce])

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="pl-6 pr-6 pt-2 pb-6 bg-white border-b border-gray-200">
                        <ul role="list" class="space-y-6">
                            @foreach ($announce->comments as $comment)
                                <li>
                                    <div class="relative pb-2">
                                        <div class="relative flex items-start space-x-3">

                                            @livewire('rounded-avatar', ['announce' => $comment])

                                            <div class="min-w-0 flex-1">
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="#" class="font-medium text-gray-900">{{ $comment->user->name }}</a>
                                                    </div>
                                                    <p class="mt-0.5 text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                                </div>

                                                <div class="mt-2 text-sm text-gray-700">
                                                    <p>{{ $comment->text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @livewire('comment.textarea', ['announce' => $announce])

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
