@props(['href', 'path'])

@if ($path === $href)
    <li class="hover:bg-gray-50/[0.30] text-gray-700 py-4 bg-gray-300/[1]">
        <a class="pl-10 font-semibold font-secondary" href="{{ $href }}">{{ $slot }}</a>
    </li>
@else
    <li class="hover:bg-gray-50/[0.30] py-4">
        <a class="pl-10 font-light font-secondary" href="{{ $href }}">{{ $slot }}</a>
    </li>
@endif
