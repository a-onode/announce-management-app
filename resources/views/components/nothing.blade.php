<div class="text-center py-8">
    <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-3xl">投稿された{{ $word }}は存在しません</h1>
    @if ($word !== 'お気に入り')
        <p class="mt-4 text-sm leading-7 text-gray-600">ユーザから{{ $word }}が投稿されるのをお待ちください。</p>
    @endif
</div>
