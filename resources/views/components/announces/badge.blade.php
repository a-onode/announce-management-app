@php
    switch ($announceType) {
        case 1:
            $type = '全般';
            $bgColor = 'bg-pink-100';
            $txtColor = 'text-pink-700';
            break;
        case 2:
            $type = '技術';
            $bgColor = 'bg-indigo-100';
            $txtColor = 'text-indigo-700';
            break;
        case 3:
            $type = '運用';
            $bgColor = 'bg-green-100';
            $txtColor = 'text-green-700';
            break;
        case 4:
            $type = '庶務';
            $bgColor = 'bg-purple-100';
            $txtColor = 'text-purple-700';
            break;
    }
@endphp

<span class="inline-flex items-center rounded-md {{ $bgColor }} px-2 py-1 text-xs font-medium {{ $txtColor }}">{{ $type }}</span>
