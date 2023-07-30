<div class="bg-white px-4 py-5 sm:px-6">
    <div class="flex space-x-3">

        @livewire('rounded-avatar', ['user' => $announce->user])

        <div class="min-w-0 flex-1">
            <div class="flex justify-between">
                <div>
                    <div class="flex pb-1">
                        <p class="text-sm font-semibold text-gray-900">
                            <a href="{{ route('users.show', ['user' => $announce->user->id]) }}" class="hover:underline">{{ $announce->user->name }}</a>
                        </p>
                        <p class="text-sm text-gray-500 pl-2">
                            <a href="#" class="hover:underline">{{ $announce->created_at->diffForHumans() }}</a>
                        </p>
                    </div>
                    <div class="flex pb-1">
                        <x-announces.badge :announce-type="$announce->type" />
                        <p class="font-semibold text-lg text-gray-800 pl-1">
                            <a href="{{ route('announces.show', ['announce' => $announce->id]) }}" class="hover:underline">{{ $announce->name }}</a>
                        </p>
                    </div>
                </div>

                @livewire('dropdown-menu', ['announce' => $announce], key('announce-dropdown-' . $announce->id))
            </div>

            <div>
                <a href="{{ route('announces.show', ['announce' => $announce->id]) }}" class="text-sm text-gray-600">
                    {!! nl2br(e($announce->text)) !!}
                </a>
            </div>

            @if ($announce->file1 || $announce->file2)
                @livewire('images', ['announce' => $announce])
            @endif

            @if ($announce->url)
                @livewire('external-link', ['announce' => $announce])
            @endif

            @if (!$announce->comments->isEmpty() && !request()->routeIs('announces.show'))
                <x-comments.counter :announce="$announce" />
            @endif
        </div>
    </div>
</div>
