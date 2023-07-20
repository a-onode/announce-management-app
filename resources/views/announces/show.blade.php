<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $announce->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-white px-4 pt-5 sm:px-6">
            <x-flash-message />

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

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <ul role="list" class="space-y-6">
                    @foreach ($announce->comments as $comment)
                        <li>
                            <div class="relative pb-2">
                                <div class="relative flex items-start space-x-3">
                                    <div class="relative">
                                        <img class="flex h-10 w-10 items-center justify-center rounded-full bg-white ring-8 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80">
                                        <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px">
                                            <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
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

                <x-comments.textarea />

            </div>
        </div>
    </div>

</x-app-layout>
