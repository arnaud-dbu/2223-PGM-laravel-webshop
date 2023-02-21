@if (session()->has('message'))
    <span x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="fixed top-2 left-1/2 -translate-x-1/2 w-fit px-5 text-xl font-medium font-secondary py-2 bg-gray-700/[0.40] text-gray-50 text-center">
        {{ session('message') }}
    </span>
@endif
