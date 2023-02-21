@props(['title', 'description', 'cart'])

<x-guest-layout :cart=$cart>
    <div class= "uppercase w-screen h-screen font-medium font-secondary bg-gray-200 text-gray-900" >
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg">
            <div class="flex flex-col items-center">
                <x-typography.h1>{{$title}}</x-typography.h1>
                <p class="text-gray-900 text-lg">{{$description}}</p>
            </div>
            <div class="">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-guest-layout>