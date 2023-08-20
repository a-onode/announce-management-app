<form x-data="{ name: '', text: '', url: '', draftBtn: false, slackBtn: false }" action="{{ route('announces.store') }}" method="post" id="announceForm" enctype="multipart/form-data">
    @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">周知内容</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">件名</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md @error('name') bg-red-50 ring-red-500 focus-within:ring-red-500 @enderror">
                            <input type="text" x-model="name" wire:model.lazy="name" name="name" id="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @error('name')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="text" class="block text-sm font-medium leading-6 text-gray-900">本文</label>
                    <div class="mt-2">
                        <textarea x-model="text" wire:model.lazy="text" id="text" name="text" rows="8"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('text') bg-red-50 ring-red-500 focus:ring-red-500 @enderror"></textarea>
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
                        <x-icons.clip />
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">{{ $firstFile ? $firstFile->getClientOriginalName() : 'ファイルを追加する' }}</span>
                        <input wire:model="firstFile" id="firstFile" name="firstFile" type="file" class="sr-only">
                    </label>
                </div>

                <div class="col-span-full">
                    <p class="block text-sm font-medium leading-6 text-gray-900 mb-2">ファイル（２）</p>
                    <label class="group -my-2 -ml-2 inline-flex items-center rounded-full px-3 py-2 text-left text-gray-400">
                        <x-icons.clip />
                        <span class="text-sm italic text-gray-500 group-hover:text-gray-600">{{ $secondFile ? $secondFile->getClientOriginalName() : 'ファイルを追加する' }}</span>
                        <input wire:model="secondFile" id="secondFile" name="secondFile" type="file" class="sr-only">
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
                                <option value="{{ \Constant::ANNOUNCE_LIST['general'] }}" selected>全般</option>
                                <option value="{{ \Constant::ANNOUNCE_LIST['tech'] }}">技術</option>
                                <option value="{{ \Constant::ANNOUNCE_LIST['operation'] }}">運用</option>
                                <option value="{{ \Constant::ANNOUNCE_LIST['office'] }}">事務</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6 space-y-6">
                    <div class="sm:col-span-3">
                        <label for="authority" class="block text-sm font-medium leading-6 text-gray-900">対象</label>
                        <div class="mt-2">
                            <select wire:model="authority" id="authority" name="authority" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="1" selected>全体向け周知</option>
                                <option value="2">ALD以上向け周知</option>
                                <option value="3">LD以上向け周知</option>
                                <option value="4">SV,MGR以上向け周知</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex flex-grow flex-col">
                        <label for="isDraft" class="text-sm font-medium leading-6 text-gray-900">下書き保存する</label>
                        <input type="hidden" name="isDraft" x-bind:value="draftBtn ? '1' : '0'">
                    </span>
                    <button type="button" @click="draftBtn = !draftBtn, slackBtn = false" :class="{ 'bg-indigo-600': draftBtn, 'bg-gray-200': !draftBtn }" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out">
                        <span :class="{ 'translate-x-5': draftBtn, 'translate-x-0': !draftBtn }" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <span class="flex flex-grow flex-col">
                        <label for="isSlack" class="text-sm font-medium leading-6 text-gray-900">Slackへ通知する</label>
                        <input type="hidden" name="isSlack" x-bind:value="slackBtn ? '1' : '0'">
                    </span>
                    <button type="button" @click="slackBtn = !slackBtn, draftBtn = false" :class="{ 'bg-indigo-600': slackBtn, 'bg-gray-200': !slackBtn }" class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out">
                        <span :class="{ 'translate-x-5': slackBtn, 'translate-x-0': !slackBtn }" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" @click="name = '', text = '',url = '', draftBtn = false, slackBtn = false" class="text-sm leading-6 text-gray-900">クリア</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">投稿する</button>
    </div>
</form>
