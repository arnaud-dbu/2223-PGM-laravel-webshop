<li class="md:w-[calc(50%-0.75rem)] lg:w-[calc(33.33%-0.75rem)] xl:w-[calc(33.33%-0.75rem)] ">
    <a href="{{ route('product.show', $product->id) }}" class="h-full" href="/product">
        <div class="flex flex-col items-center mx-6 mb-5 font-medium md:mx-0">
            <div class="relative">
                <img class="w-full pb-3 transition-opacity hover:opacity-80" src="{{ asset('storage/' . $product->image) }}" alt="">
                <x-sold-out-figcaption :product=$product />
            </div>
            <span>{{ $product->artisan }}</span>
            <span>{{ $product->name }}</span>
            <span class="text-sm font-normal">€{{ $product->price }}</span>
        </div>
    </a>
</li>
