<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">基本情報</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">ユーザ名</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>


                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">自己紹介</label>
                    <div class="mt-2">
                        <textarea id="introduction" name="introduction" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $user->introduction }}</textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600"></p>
                </div>

                <div x-data="{ imagePreview: '{{ asset('storage/images/users/' . $user->profile_image) }}' }" class="col-span-full">
                    <label class="block text-sm font-medium leading-6 text-gray-900">プロフィール画像</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <img class="h-10 w-10 rounded-md" :src="imagePreview">
                        <input x-ref="profImageInput" type="file" name="profile_image" id="profile_image" class="sr-only" accept="image/jpeg,image/png" @change="fileChanged">
                        <button @click="$refs.profImageInput.click()" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">画像を選択</button>
                    </div>
                </div>

                <div x-data='{
                    imagePreview: "{{ asset('storage/images/backgrounds/' . $user->background_image) }}",
                    dragOver: false,
                    handleDrop: function($event) {
                        const reader = new FileReader();
                        const files = $event.dataTransfer.files;
                        if (files.length !== 1) return;
                        const file = files[0];
                        if (!file.type.startsWith("image/")) return;

                        reader.onload = (e) => {
                            this.imagePreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                }'
                    class="col-span-full">
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
                                    <input x-ref="bgImageInput" id="background-image" name="background-image" type="file" class="sr-only" accept="image/jpeg,image/png" @change="fileChanged">
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

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">メールアドレス</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ $user->email }}" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">性別</label>
                    <div class="mt-2">
                        <select id="gender" name="gender" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option>選択しない</option>
                            <option>男性</option>
                            <option>女性</option>
                            <option>その他</option>
                        </select>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                    <div class="mt-2">
                        <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                    <div class="mt-2">
                        <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                    <div class="mt-2">
                        <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                    <div class="mt-2">
                        <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important changes, but you pick what else you want to hear about.</p>

            <div class="mt-10 space-y-10">
                <fieldset>
                    <legend class="text-sm font-semibold leading-6 text-gray-900">By Email</legend>
                    <div class="mt-6 space-y-6">

                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                                <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                            </div>
                        </div>
                        <div class="relative flex gap-x-3">
                            <div class="flex h-6 items-center">
                                <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                            <div class="text-sm leading-6">
                                <label for="offers" class="font-medium text-gray-900">Offers</label>
                                <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="text-sm font-semibold leading-6 text-gray-900">Push Notifications</legend>
                    <p class="mt-1 text-sm leading-6 text-gray-600">These are delivered via SMS to your mobile phone.</p>
                    <div class="mt-6 space-y-6">
                        <div class="flex items-center gap-x-3">
                            <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Everything</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Same as email</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">No push notifications</label>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">キャンセル</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">保存する</button>
    </div>
</form>
