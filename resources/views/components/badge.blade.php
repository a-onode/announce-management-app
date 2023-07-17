@php
    if ($role === 1) {
        $role = 'AGT';
        $bgColor = 'bg-green-50';
        $txtColor = 'text-green-700';
    }
    if ($role === 2) {
        $role = 'ALD';
        $bgColor = 'bg-orange-50';
        $txtColor = 'text-orange-700';
    }
    if ($role === 3) {
        $role = 'LD';
        $bgColor = 'bg-gray-400';
        $txtColor = 'text-black';
    }
    if ($role === 4) {
        $role = 'SV';
        $bgColor = 'bg-purple-100';
        $txtColor = 'text-purple-700';
    }
    if ($role === 5) {
        $role = 'MGR';
        $bgColor = 'bg-gray-100';
        $txtColor = 'text-gray-600';
    }
@endphp

<p class="inline-flex items-center rounded-full {{ $bgColor }} px-1.5 py-0.5 text-xs font-medium {{ $txtColor }}">{{ $role }}</p>
