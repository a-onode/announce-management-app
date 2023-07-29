<div wire:poll.60000ms class="flex-shrink-0">
    @if ($user->isOnline())
        <span class="relative inline-block">
            <img class="h-10 w-10 rounded-md" src="{{ asset('storage/images/users/' . $user->profile_image) }}">
            <span class="absolute right-0 top-0 block h-2.5 w-2.5 -translate-y-1/2 translate-x-1/2 transform rounded-full bg-green-400 ring-2 ring-white"></span>
        </span>
    @else
        <span class="relative inline-block">
            <img class="h-10 w-10 rounded-md" src="{{ asset('storage/images/users/' . $user->profile_image) }}">
            <span class="absolute right-0 top-0 block h-2.5 w-2.5 -translate-y-1/2 translate-x-1/2 transform rounded-full bg-gray-300 ring-2 ring-white"></span>
        </span>
    @endif
</div>
