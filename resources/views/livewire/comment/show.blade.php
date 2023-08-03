<div class="relative bg-white px-4 pt-5 sm:px-6">
    <div class="relative flex items-start space-x-3">

        <div class="relative">
            <img class="h-10 w-10 rounded-md" src="{{ asset('storage/images/users/' . $comment->user->profile_image) }}">
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
                    <p class="text-sm font-semibold text-gray-900">
                        <a href="{{ route('users.show', ['user' => $comment->user_id]) }}" class="hover:underline">{{ $comment->user->name }}</a>
                    </p>
                    <p class="mt-0.5 text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>

                @if ($comment->user->id === Auth::id())
                    @livewire('comment.dropdown', ['comment' => $comment], key('comment-dropdown-' . $comment->id))
                @endif
            </div>

            <a href="{{ route('announces.show', ['announce' => $comment->announce->id]) }}" class="mt-2 text-sm text-gray-700">
                <p>{!! nl2br(e($comment->text)) !!}</p>
            </a>

            <div>
                <a href="{{ route('announces.show', ['announce' => $comment->announce->id]) }}" class="text-gray-700 hover:text-indigo-600 hover:bg-gray-100 group flex items-center rounded-md p-2 text-sm leading-6 font-semibold">
                    <x-announces.badge :announce-type="$comment->announce->type" />
                    <span class="pl-1 truncate">{{ $comment->announce->name }}</span>
                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
