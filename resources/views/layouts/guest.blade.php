@props(['cart', 'pageTitle'])

<x-base-layout >
    @include('partials._header')
    {{ $slot }}
</x-base-layout>
