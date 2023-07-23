<div wire:poll.60000ms class="flex-shrink-0">
    @if ($announce->user->isOnline())
        <span class="relative inline-block">
            <img class="h-10 w-10 rounded-md" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <span class="absolute right-0 top-0 block h-2.5 w-2.5 -translate-y-1/2 translate-x-1/2 transform rounded-full bg-green-400 ring-2 ring-white"></span>
        </span>
    @else
        <span class="relative inline-block">
            <img class="h-10 w-10 rounded-md" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            <span class="absolute right-0 top-0 block h-2.5 w-2.5 -translate-y-1/2 translate-x-1/2 transform rounded-full bg-gray-300 ring-2 ring-white"></span>
        </span>
    @endif
</div>
