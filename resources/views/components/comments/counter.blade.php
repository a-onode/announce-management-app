<dl class="flex w-full flex-none gap-x-8 sm:w-auto pt-2">
    <div class="flex items-center -space-x-0.5">
        <dt class="sr-only">Commenters</dt>
        @foreach ($announce->comments as $comment)
            <dd>
                <img class="h-6 w-6 rounded-md bg-gray-50 ring-2 ring-white" src="https://images.unsplash.com/photo-1505840717430-882ce147ef2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Emma Dorsey">
            </dd>
            @if ($loop->iteration >= 4)
            @break
        @endif
    @endforeach
    <div class="pl-2">
        <a href="{{ route('announces.show', ['announce' => $announce]) }}" class="text-sm font-bold text-gray-800 hover:underline">{{ $announce->comments->count() }}件のコメント</a>
    </div>
</div>
</dl>
