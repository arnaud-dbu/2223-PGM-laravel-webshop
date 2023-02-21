<x-guest-layout :cart=$cart>
    {{-- Hero --}}
    <x-hero title="Ceramics & pottery" image="welcome.webp" /> 

    {{-- Latest products --}}
    <x-typography.h2 class="my-7">New in</x-typography.h2>
    <ul class="flex gap-5 px-6 overflow-scroll hide-scrollbar lg:flex-wrap justify-between lg:mx-auto 2xl:w-[90rem]">
        @foreach ($products as $product)
            @include('partials._product')
        @endforeach
    </ul>

    {{-- Link to product index page --}}
    <div class="flex justify-center w-full">
        <a class="py-3 font-medium text-center uppercase bg-gray-900 font-secondary text-gray-50 px-7 my-7 hover:opacity-90"
            href="{{ route('product.index') }}">View all product</a>
    </div>

    {{-- Discover section --}}
    <section class="relative w-screen bg-center bg-cover h-[25rem] lg:h-[25rem] lg:bg-fixed 2xl:h-[30rem]"
        style="background-image: url({{ asset('storage/table.webp') }})">
        <div
            class="absolute w-5/6 p-5 translate-x-1/2 translate-y-1/2 bg-gray-50 py-10 right-1/2 bottom-1/2 lg:mx-auto md:w-[30rem]">
            <div class="flex flex-col items-center justify-center h-full">
                <x-typography.h3 class="mb-3">Eva Ceramics</x-typography.h3>
                <p class="mb-3 text-lg leading-6 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab
                    laboriosam necessitatibus iste fugit consequuntur blanditiis dolores consectetur aspernatur
                    repudiandae rem possimus voluptatum ullam minus, maxime ipsa qui perspiciatis, nisi laborum?</p>
                <x-link.primary-link>Discover the full story</x-link.primary-link>
            </div>
        </div>
    </section>

    {{-- Categories section --}}
    <section>
        <x-typography.h2 class="my-7">Explore</x-typography.h2>
        <div class="md:flex md:flex-wrap md:justify-between md:px-6 md:gap-4 lg:mx-auto 2xl:w-[90rem]">
            @foreach ($categories as $category)
                @include('partials._card')
            @endforeach
        </div>
    </section>
</x-guest-layout>
