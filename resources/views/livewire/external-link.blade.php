<div class="bg-white border shadow-sm sm:rounded-lg mt-2">
    <a href="{{ $announce->url }}" target="_blank">
        <div class="flex flex-col  text px-4 py-6 sm:p-4">
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $title }}</h3>
            <div class="mt-1 max-w-xl text-sm text-gray-500">
                <p wire:init='getTitleUrl()'>{{ $announce->url }}</p>
            </div>
        </div>
    </a>
</div>
