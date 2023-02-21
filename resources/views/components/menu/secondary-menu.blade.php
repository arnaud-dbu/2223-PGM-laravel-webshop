@props(['title'])

<section>
    <div {{ $attributes->merge(['class' => 'fixed w-9/12 h-screen bg-white top-0 z-10']) }} >
        <button class="absolute right-4 top-6">
            <svg id="close-cart" class="fill-gray-800" xmlns="http://www.w3.org/2000/svg" width="25.24" height="25.24" viewBox="0 0 25.24 25.24"><path d="M462.5,57.4l-1.142-1.142L449.878,67.736,438.4,56.258,437.258,57.4l11.478,11.478L437.258,80.356,438.4,81.5,449.878,70.02,461.356,81.5l1.142-1.142L451.02,68.878Z" transform="translate(-437.258 -56.258)" opacity="0.67"/></svg>
        </button>
        {{$slot}}
    </div>
    {{-- <div id="menu-bg" class="fixed top-0 left-0 z-40 hidden w-screen h-screen bg-gray-900 opacity-0 mobile-bg filter-bg close"></div> --}}
</section>