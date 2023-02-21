@props(['path', 'latestOrder', 'todayOrders'])

<x-base-layout>
    <div class="flex">
        @include('partials._admin-header')
        {{$slot}}
    </div>
</x-base-layout>