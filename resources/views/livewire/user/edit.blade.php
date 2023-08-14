<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" id="userForm" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">基本情報</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">ユーザ名</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md @error('name') bg-red-50 ring-red-500 focus-within:ring-red-500 @enderror">
                            <input type="text" name="name" id="name" value="{{ $user->name }}" wire:model.lazy="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    @error('name')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">自己紹介</label>
                    <div class="mt-2">
                        <textarea id="introduction" name="introduction" rows="5" wire:model.lazy="introduction"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('introduction') bg-red-50 ring-red-500 focus:ring-red-500 @enderror">{{ $user->introduction }}</textarea>
                    </div>
                    @error('introduction')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div x-data="{ imagePreview: '{{ asset('storage/images/user/' . $user->profile_image) }}' }" class="col-span-full">
                    <label class="block text-sm font-medium leading-6 text-gray-900">プロフィール画像</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <img class="h-10 w-10 rounded-md" :src="imagePreview">
                        <input x-ref="profImageInput" type="file" name="profile_image" id="profile-image" class="sr-only" accept="image/jpeg,image/png" @change="fileChanged">
                        <button @click="$refs.profImageInput.click()" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">画像を選択</button>
                    </div>
                </div>

                <div x-data="{
                    imagePreview: '{{ asset('storage/images/background/' . $user->background_image) }}',
                    dragOver: false,
                    handleDrop: function($event) {
                        const reader = new FileReader();
                        const files = $event.dataTransfer.files;
                        if (files.length !== 1) return;
                        const file = files[0];
                        if (!file.type.startsWith('image/')) return;
                
                        reader.onload = (e) => {
                            this.imagePreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }" class="col-span-full">
                    <label for="background-image" class="block text-sm font-medium leading-6 text-gray-900">バックグラウンド背景</label>
                    <div class="relative mt-2 flex justify-center px-6 py-10 disable-pointer-events" @click="$refs.bgImageInput.click()" @dragover.prevent="dragOver = true" @dragleave="dragOver = false" @drop.prevent="handleDrop($event)">
                        <img :src="imagePreview" class="absolute inset-0 w-full h-full rounded-lg object-cover z-0 opacity-50">
                        <div class="text-center z-10">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-2 flex text-sm leading-6 text-gray-700">
                                <label for="file-upload" class="relative cursor-pointer rounded-md font-semibold text-indigo-600 focus-within:outline-none hover:text-indigo-500">
                                    <span>画像を選択</span>
                                    <input x-ref="bgImageInput" id="background-image" name="background_image" type="file" class="sr-only" accept="image/jpeg,image/png" @change="fileChanged">
                                </label>
                                <p class="pl-1 font-semibold">または、ドラックアンドドロップ</p>
                            </div>
                            <p class="text-xs leading-5 font-semibold text-gray-800">PNG, JPG, PNGのみ指定可能</p>
                        </div>
                    </div>
                </div>

                <script>
                    'use strict';

                    function fileChanged(event) {
                        const reader = new FileReader();
                        const input = event.target;
                        if (input.files && input.files[0]) {
                            reader.onload = (e) => {
                                this.imagePreview = e.target.result;
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">詳細情報</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">入社日</label>
                    <div class="mt-2">
                        <p class="whitespace-nowrap px-2 text-sm text-gray-900">{{ $user->joined_date->format('Y年n月j日') }}</p>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">メールアドレス</label>
                    <div class="mt-2">
                        <p class="whitespace-nowrap px-2 text-sm text-gray-900">{{ $user->email }}</p>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">パスワード</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" wire:model.lazy="password"
                            class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') bg-red-50 ring-red-500 focus:ring-red-500 @enderror">
                    </div>
                    @error('password')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div>
                    <label for="password-confirmation" class="block text-sm font-medium leading-6 text-gray-900">確認用パスワード</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password-confirmation" wire:model.lazy="password_confirmation"
                            class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password_confirmation') bg-red-50 ring-red-500 focus:ring-red-500 @enderror">
                    </div>
                    @error('password_confirmation')
                        <x-validation-message :message="$message" />
                    @enderror
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">性別</label>
                    <div class="mt-2">
                        <select id="gender" name="gender" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="" {{ is_null($user->gender) ? 'selected' : '' }}>選択しない</option>
                            <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>男性</option>
                            <option value="2" {{ $user->gender === 2 ? 'selected' : '' }}>女性</option>
                            <option value="3" {{ $user->gender === 3 ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">その他</h2>

            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8">

                <div class="flex items-center justify-between">
                    <span class="flex flex-grow flex-col">
                        <span class="text-sm font-medium leading-6 text-gray-900" id="availability-label">アカウントを非公開にする</span>
                        <span class="text-sm text-gray-500" id="availability-description">許可されたユーザのみ投稿を閲覧できます。</span>
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
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">キャンセル</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">保存する</button>
    </div>

</form>

<script>
    'use strict';

    window.livewire.on('validationSuccess', () => {
        document.getElementById('userForm').submit();
    });
</script>
