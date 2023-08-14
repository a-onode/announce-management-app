<div class="bg-white px-4 py-5 sm:px-6">
    <div class="flex space-x-3">
        <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
            <div class="w-4/5 ml-4 mt-4">
                <a href="{{ route('users.show', ['user' => $user->id]) }}">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            @livewire('rounded-avatar', ['user' => $user])
                        </div>
                        <div class="ml-4">
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="flex items-center gap-2">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 hover:underline">{{ $user->name }}</h3>
                                <x-badge :role="$user->role" />
                            </a>
                            <p class="text-sm text-gray-500">
                                {{ mb_strimwidth($user->introduction, 0, 150, '...') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @if ($user->id !== Auth::id())
                <x-follow-button :user="$user" />
            @endif
        </div>
    </div>
</div>
