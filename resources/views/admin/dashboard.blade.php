@php
    $collection = $collections->first();
@endphp

<x-admin-layout :path=$path :latestOrder=$latestOrder :todayOrders=$todayOrders>
    @switch($path)
        @case('categories')
            <x-admin.categories :collections=$collections :search=$search :path=$path />
            @break
        @case('products')            
            <x-admin.products :collections=$collections :search=$search :categories=$categories :path=$path   />
            @break
        @case('users')            
            <x-admin.users :collections=$collections :search=$search :path=$path />
            @break
        @case('orders')            
            <x-admin.orders :collections=$collections :search=$search :orderItems=$orderItems :path=$path />
            @break
        @default
    @endswitch
</x-admin-layout>