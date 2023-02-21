@if (session()->has('message'))
    <span x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="fixed top-20 left-1/2 -translate-x-1/2 w-fit px-8 font-medium font-secondary py-2 bg-gray-500/[0.9] shadow text-gray-50 text-center">
        {{ session('message') }}
    </span>
@endif
