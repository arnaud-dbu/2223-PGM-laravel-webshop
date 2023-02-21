<x-guest-layout :cart=$cart>
    <x-typography.h1 class="py-5 bg-gray-600 text-gray-50">Checkout</x-typography.h1>
    <ul class="mx-auto my-5 px-5 w-full max-w-[90rem]">

        @foreach ($cart as $item)
            <li class="flex gap-4 mb-7">
                <div class="relative">
                    <div class="w-24 h-24 bg-cover" style="background-image: url({{ asset('storage/' . $item->options->image) }})"></div>
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-gray-800 rounded-full font-secondary text-gray-50 -right-2 -top-2">{{ $item->qty }}</span>
                </div>

                <div class="flex flex-col justify-between">
                    <div class="flex flex-col text-sm font-medium">
                        <span>{{ $item->options->artisan }}</span>
                        <span>{{ $item->name }}</span>
                        <span class="font-normal">€{{ $item->price }}</span>
                    </div>
                    <div class="flex gap-5 text-sm font-secondary ">
                        <a class="text-gray-900 hover:opacity-50" href="{{ route('product.show', $item->id) }}">Edit</a>
                        <form method="POST" action="{{ route('cart.destroy', $item->rowId) }}">
                            @csrf
                            @method('DELETE')
                            <button class="flex gap-5 text-sm text-gray-900 uppercase font-secondary hover:text-red-600 hover:opacity-70">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</x-guest-layout>
