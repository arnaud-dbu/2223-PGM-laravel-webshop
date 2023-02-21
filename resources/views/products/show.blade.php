<x-guest-layout :cart=$cart>
    <section class="mt-[3.5rem] lg:mt-[5rem] lg:flex  lg:mx-auto 2xl:w-[90rem] lg:my-12" >

        {{-- Product details --}}
        <div class="relative h-[30rem] w-full bg-cover bg-bottom lg:mx-6 lg:my-8 lg:w-[45%]" style="background-image: url({{ asset('storage/' . $product->image) }})">
            <x-sold-out-figcaption :product=$product />
        </div>
    
        <div class="max-w-xl px-6 mx-auto my-8 md:my-10 lg:w-[55%] lg:pl-[2.5rem] lg:max-w-none">
            <div class="flex flex-col items-center gap-1 pb-4 font-light">
                <span class="text-sm">{{$product->artisan}}</span>
                <span class="text-2xl font-medium">{{$product->name}}</span>
                <span class="font-normal text-md">€{{$product->price}}</span>
            </div>
        
            {{-- Counter --}}
            <form method="POST" action="{{ route('cart.store') }}" class="flex flex-col items-">
                @csrf
                <div class="flex justify-center">
                    <div class="flex items-center gap-5 px-5 py-2 border-2 border-gray-300 quantity-counter fit-content w-fit">
                        <div id="counter-decrement" class="flex items-center justify-center h-full decrement">
                            <img src="/svg/min.svg" class="w-5" alt="">
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input id="counter-value" class="w-5 text-xl text-center bg-gray-100 value font-nunito" type="number" name="quantity" value="{{isset($cartItem) ? $cartItem->qty : 1}}">
                        <div id="counter-increment" class="flex items-center justify-center h-full increment">
                            <img src="/svg/plus.svg" class="w-5" alt="">
                        </div>
                    </div>
                </div>

                {{-- Product stock information --}}
                @if ($product->stock <= 3 AND $product->stock >= 1)
                    <span class="mt-2 font-light text-center text-red-500 normal-case font-secondary">Only {{$product->stock}} {{$product->stock === 1 ? 'piece' : 'pieces' }} in stock!</span>
                @endif

                {{-- {{dd($cartItem)}} --}}

                {{-- Add to cart btn --}}
                @if ($cartItem === null)
                    <x-button.primary-btn class="w-full mb-0">Add to cart</x-button.primary-btn>
                    @else
                    <button type="submit" class='w-full py-3 mb-0 font-medium text-center text-gray-500 uppercase bg-gray-100 border-2 border-gray-400 shadow font-secondary px-7 my-7 hover:opacity-90'>
                        Update cart
                    </button>
                @endif
    
                {{-- Feedback messages --}}
                <x-message.primary-message/>
            </form>
            <p class="mt-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae dignissimos doloribus, a porro fugit quae nihil praesentium laboriosam hic perferendis minima repellat autem architecto adipisci optio sit quo id et. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos quidem sequi, illo recusandae quam facere eveniet nam nobis corrupti ad unde reprehenderit laborum possimus obcaecati accusantium earum cumque voluptatibus sunt.</p>
            <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae dignissimos doloribus, a porro fugit quae nihil praesentium laboriosam hic perferendis minima repellat autem architecto adipisci optio sit quo id et.</p>
        </div>
    </section>

    {{-- Other products --}}
    <section class="mb-10">
        <x-typography.h3 class="my-8">Look at these</x-typography.h3>
        <ul class="flex gap-5 px-6 overflow-scroll hide-scrollbar lg:flex-wrap justify-between lg:mx-auto 2xl:w-[90rem]">
            @foreach ($products as $product)
                @include('partials._product')
            @endforeach
        </ul>
    </section>
</x-guest-layout>