<form wire:submit.prevent="store()" enctype="multipart/form-data">
    @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">周知内容</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">件名</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md @error('name') bg-red-50 ring-red-500 focus-within:ring-red-500 @enderror">
                            <input type="text" wire:model.lazy="name" name="name" id="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    @error('name')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="text" class="block text-sm font-medium leading-6 text-gray-900">本文</label>
                    <div class="mt-2">
                        <textarea wire:model.lazy="text" id="text" name="text" rows="8" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('text') bg-red-50 ring-red-500 focus:ring-red-500 @enderror"></textarea>
                    </div>

                    @error('text')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">添付資料</h2>

            <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <p class="block text-sm font-medium leading-6 text-gray-900 mb-2">ファイル（１）</p>
                    <label class="group -my-2 -ml-2 inline-flex items-center rounded-full px-3 py-2 text-left text-gray-400">
                        <svg class="-ml-1 mr-2 h-5 w-5 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">ファイルを追加する</span>
                        <input id="file1" name="file1" type="file" class="sr-only">
                    </label>
                </div>

                <div class="col-span-full">
                    <p class="block text-sm font-medium leading-6 text-gray-900 mb-2">ファイル（２）</p>
                    <label class="group -my-2 -ml-2 inline-flex items-center rounded-full px-3 py-2 text-left text-gray-400">
                        <svg class="-ml-1 mr-2 h-5 w-5 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">ファイルを追加する</span>
                        <input id="file2" name="file2" type="file" class="sr-only">
                    </label>
                </div>

                <div class="col-span-full">
                    <label for="url" class="block text-sm font-medium leading-6 text-gray-900">URL</label>
                    <div class="mt-2">
                        <input type="url" name="url" id="url" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('url') bg-red-50 ring-red-500 focus:ring-red-500 @enderror"
                            wire:model.lazy="url" placeholder="https://example.com">
                    </div>

                    @error('url')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">追加オプション</h2>

            <div class="mt-6 space-y-10">
                <div class="mt-6 space-y-6">
                    <div class="sm:col-span-3">
                        <label for="type" class="block text-sm font-medium leading-6 text-gray-900">カテゴリー</label>
                        <div class="mt-2">
                            <select wire:model="type" id="type" name="type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="1">一般</option>
                                <option value="2">技術</option>
                                <option value="3">運用</option>
                                <option value="4">事務</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6 space-y-6">
                    <div class="sm:col-span-3">
                        <label for="authority" class="block text-sm font-medium leading-6 text-gray-900">対象</label>
                        <div class="mt-2">
                            <select wire:model="authority" id="authority" name="authority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="1">全体向け周知</option>
                                <option value="2">ALD以上向け周知</option>
                                <option value="3">LD以上向け周知</option>
                                <option value="4">SV,MGR以上向け周知</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex flex-grow flex-col">
                        <span class="text-sm font-medium leading-6 text-gray-900" id="availability-label">非公開にする</span>
                    </span>
                    <button type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="availability-label"
                        aria-describedby="availability-description">
                        <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex flex-grow flex-col">
                        <span class="text-sm font-medium leading-6 text-gray-900" id="availability-label">Slackへ通知する</span>
                    </span>
                    <button type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="availability-label"
                        aria-describedby="availability-description">
                        <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm leading-6 text-gray-900">クリア</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">投稿する</button>
    </div>
</form>
