<ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8 mt-2">
    @if ($announce->file1)
        <li class="relative">
            <div wire:click="openImageModal1" class="group block w-full h-40 overflow-hidden rounded-lg bg-gray-100">
                <img src="{{ asset('storage/' . $announce->file1) }}" class="pointer-events-none w-full h-full object-cover group-hover:opacity-75">
            </div>
            <p class="pointer-events-none mt-1 block truncate text-xs font-medium text-gray-500">{{ $announce->file1 }}</p>
        </li>

        @if ($isVisibleImageModal1)
            <div class="relative z-10" aria-labelledby="modal-title" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
                            <button wire:click="closeImageModal1()" type="button" class="absolute right-6 top-0 m-2 rounded-md text-gray-500 hover:text-gray-600 focus:outline-none">
                                <span class="sr-only">クローズボタン</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <img src="{{ asset('storage/' . $announce->file1) }}" class="pointer-events-none w-full h-full object-cover group-hover:opacity-75">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($announce->file2)
        <li class="relative">
            <div wire:click="openImageModal2" class="group block w-full h-40 overflow-hidden rounded-lg bg-gray-100">
                <img src="{{ asset('storage/' . $announce->file2) }}" class="pointer-events-none w-full h-full object-cover group-hover:opacity-75">
            </div>
            <p class="pointer-events-none mt-1 block truncate text-xs font-medium text-gray-500">{{ $announce->file1 }}</p>
        </li>

        @if ($isVisibleImageModal2)
            <div class="relative z-10" aria-labelledby="modal-title" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
                            <button wire:click="closeImageModal2()" type="button" class="absolute right-6 top-0 m-2 rounded-md text-gray-500 hover:text-gray-600 focus:outline-none">
                                <span class="sr-only">クローズボタン</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <div class="bg-white">
                                <img src="{{ asset('storage/' . $announce->file2) }}" class="pointer-events-none w-full h-full object-cover group-hover:opacity-75">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    @endif

</ul>
