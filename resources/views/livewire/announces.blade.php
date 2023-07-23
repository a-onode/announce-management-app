@foreach ($announces as $announce)
    <div class="bg-white px-4 py-5 sm:px-6">
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

                    @livewire('dropdown-menu', ['announce' => $announce])
                </div>

                <div>
                    <a href="{{ route('announces.show', ['announce' => $announce->id]) }}" class="text-sm text-gray-600">
                        {{ $announce->text }}
                    </a>
                </div>

                @if ($announce->url)
                    @livewire('external-link', ['announce' => $announce])
                @endif

            </div>

        </div>
    </div>
@endforeach

<div class="bg-white px-4 pt-4 pb-6 sm:px-6">
    {{ $announces->links('vendor.livewire.tailwind2') }}
</div>
