<div class="flex flex-shrink-0 self-center">
    <div class="relative inline-block text-left">
        <div>
            <button wire:click="$toggle('commentMenu')" type="button" class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                </svg>
            </button>
        </div>

        @if ($commentMenu)
            <div wire:click="closeCommentMenu()" class="fixed top-0 left-0 w-full h-full bg-opacity-100 flex items-center justify-center"></div>

            <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                <p wire:click="openCommentEditModal()" class="text-gray-700 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-900" tabindex="-1" id="menu-0-item-1">
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                        <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                    </svg>
                    <span>編集する</span>
                </p>

                <p wire:click="openCommentDeleteModal()" class="text-gray-700 flex px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 hover:text-gray-900" tabindex="-1" id="menu-0-item-2">
                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>削除する</span>
                </p>
            </div>
        @endif
    </div>

    @if ($commentEditModal)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-20 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                    <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-lg transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <img class="inline-block h-10 w-10 rounded-full" src="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="border-b border-gray-200 focus-within:border-indigo-600">
                                        <label for="text" class="sr-only">周知ID</label>
                                        <input type="hidden" name="announce_id" value="{{ $comment->announce->id }}">
                                        <label for="text" class="sr-only">コメント</label>
                                        <textarea rows="3" name="text" id="text" class="block w-full resize-none border-0 border-b border-transparent p-0 pb-2 text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-0 sm:text-sm sm:leading-6">{{ $comment->text }}</textarea>
                                    </div>

                                    <div class="flex justify-end pt-2">
                                        <div class="flex items-center justify-between space-x-3 px-2 py-2 sm:px-3">

                                            <div class="flex-shrink-0">
                                                <button wire:click="closeCommentEditModal()" type="button" class="close-modal-button inline-flex items-center rounded-md px-3 py-2 text-sm font-semibold ttext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">キャンセル</button>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">編集する</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($commentDeleteModal)
        <div class="relative z-10" aria-labelledby="modal-title" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post" class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                        @csrf
                        @method('delete')

                        <div class="absolute right-0 top-0 hidden pr-4 pt-4 sm:block">
                            <button wire:click="closeCommentDeleteModal()" type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none">
                                <span class="sr-only">クローズボタン</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="flex flex-col mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 pt-1">このコメントを削除しますか？</h3>
                                <div class="mt-2">
                                    <label for="text" class="sr-only">周知ID</label>
                                    <input type="hidden" name="announce_id" value="{{ $comment->announce->id }}">
                                    <label for="text" class="sr-only">本文</label>
                                    <textarea name="text" id="text" class="w-full resize-none border-0 py-0 text-gray-500 sm:text-sm sm:leading-6 focus:ring-0" readonly>{{ $comment->text }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">削除</button>
                            <button wire:click="closeCommentDeleteModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">キャンセル</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
