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

                @livewire('announce.show', ['announce' => $announce], key($announce->id))

                <div x-data="{ isOpen: true }" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="pl-6 pr-6 pb-6 bg-white border-b border-gray-200">

                        <div class="relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center gap-x-1.5 rounded-full bg-white px-6 py-1.5 text-sm text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    <p x-text="isOpen ? 'コメントを閉じる': 'コメントを開く'"></p>
                                </button>
                            </div>
                        </div>

                        <div x-show="isOpen" class="space-y-6 pt-2">
                            @foreach ($announce->comments as $comment)
                                <div class="relative bg-white px-2 sm:px-4">
                                    <div class="relative flex items-start space-x-3">

                                        <div class="relative">
                                            <img class="h-10 w-10 rounded-md" src="{{ asset('storage/images/user/' . $comment->user->profile_image) }}">
                                            <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px">
                                                <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <div class="flex justify-between">
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="{{ route('users.show', ['user' => $comment->user_id]) }}" class="font-medium text-gray-900 hover:underline">{{ $comment->user->name }}</a>
                                                    </div>
                                                    <p class="mt-0.5 text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                                </div>

                                                @if ($comment->user->id === Auth::id())
                                                    @livewire('comment.dropdown', ['comment' => $comment], key('comment-dropdown-' . $comment->id))
                                                @endif
                                            </div>

                                            <div class="mt-2 text-sm text-gray-700">
                                                <p>{!! nl2br(e($comment->text)) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @livewire('comment.textarea', ['announce' => $announce])

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
