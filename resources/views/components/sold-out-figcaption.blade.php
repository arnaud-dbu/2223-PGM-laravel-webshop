@props(['product'])

@if ($product->stock === 0)
    <span class="absolute left-1 top-1 bg-gray-300/[0.9] py-2 px-3 text-sm">Sold out</span>
@endif
