<li class="lg:w-[23%]">
    <a href="/products/{{ $product->id }}" href="/product">
        <div class="flex flex-col items-center font-medium text-center">
            <div class="relative">
                <img class="w-64 pb-3 transition-opacity max-w-none hover:opacity-80 lg:w-full" src="{{ asset('storage/' . $product->image) }}" alt="">
                <x-sold-out-figcaption :product=$product />
            </div>
            <span>{{ $product->artisan }}</span>
            <span>{{ $product->name }}</span>
            <span class="text-sm font-normal">€{{ $product->price }}</span>
        </div>
    </a>
</li>
