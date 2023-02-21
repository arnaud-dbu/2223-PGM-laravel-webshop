<x-guest-layout :cart=$cart>
    {{-- hero --}}
    @if ($category)
        <x-hero title="{{ $category->name }}" image="{{ $category->image }}"> {{ $category->description }} </x-hero>
    @else
        <x-hero title="Shop by Collection" image="vases.webp">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptates dolor eaque nisi quis adipisci
            tempora eius, ad quia corrupti. Fugiat laborum odio nesciunt eaque dolor ad odit iusto est?
        </x-hero>
    @endif

    <div class="">
        {{-- Filter Categories - mobile --}}
        <section>
            <div class='filter-menu fixed top-0 z-50 w-9/12 h-screen max-w-lg -left-[32rem] bg-white'>
                <button id="close-btn" class="absolute z-50 right-4 top-6">
                    <svg class="fill-gray-800 close-btn" xmlns="http://www.w3.org/2000/svg" width="25.24" height="25.24"
                        viewBox="0 0 25.24 25.24">
                        <path
                            d="M462.5,57.4l-1.142-1.142L449.878,67.736,438.4,56.258,437.258,57.4l11.478,11.478L437.258,80.356,438.4,81.5,449.878,70.02,461.356,81.5l1.142-1.142L451.02,68.878Z"
                            transform="translate(-437.258 -56.258)" opacity="0.67" />
                    </svg>
                </button>
                <div class="flex flex-col gap-8 px-8 mt-16">
                    <div>
                        <div>
                            <x-typography.h3 class="mb-2 text-base text-start">Categories</x-typography.h3>
                            <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-30 mb-4"></div>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="mb-3 text-lg text-gray-800 normal-case font-secondary hover:opacity-80">
                                    <a href="#" data-id={{ $category->id }}
                                        href="{{ route('product.category', $category->id) }}"
                                        class="category hover:opacity-50">{{ $category->name }}</a>
                                </li>
                            @endforeach
                            <li
                                class="mb-3 text-gray-800 underline normal-case text-md font-secondary hover:opacity-80">
                                <a href="#" data-id='0' class="category all-categories hover:opacity-50">Show
                                    all categories</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div>
                            <x-typography.h3 class="mb-2 text-base text-start">Sort</x-typography.h3>
                            <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-30 mb-5"></div>
                        </div>
                        <ul class="flex flex-col gap-2 sm:flex-row">
                            <li class="">
                                <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                                     data-name="name">Name</a>
                            </li>
                            <li>
                                <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                                     data-name="artisan">Artisan</a>
                            </li>
                            <li>
                                <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                                     data-name="price">Price</a>
                            </li>
                        </ul>
                    </div>
                    <x-button.primary-btn class="filter-btn">Apply filter</x-button.primary-btn>
                </div>
            </div>
            <div id="filter-bg"
                class="fixed top-0 left-0 z-40 hidden w-screen h-screen bg-gray-900 opacity-0 mobile-bg filter-bg close">
            </div>
        </section>

        <div class="flex h-16 md:justify-end" x-data="{ sortIsOpen: false }">
            {{-- Filter buttons --}}
            <div class="hidden md:block h-full w-0.5 xl:hidden bg-gray-600 opacity-20"></div>
            <button id="open-filter-menu"
                class="w-full uppercase open-filter-menu xl:hidden md:w-52 border-neutral-200">Filter</button>
            <div class="hidden h-full w-0.5 bg-gray-600 opacity-20"></div>
        </div>
    </div>
    <div class="w-screen h-0.5 bg-gray-600 opacity-20 mb-7"></div>
    </div>

    {{-- Filer Categories - dekstop --}}
    <section class="xl:flex lg:mx-auto 2xl:w-[90rem]">
        <div class="flex-col hidden gap-8 px-8 mt-4 xl:flex">
            <div>
                <div>
                    <x-typography.h3 class="mb-2 text-base text-start">Categories</x-typography.h3>
                    <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-30 mb-4"></div>
                </div>
                <ul>
                    @foreach ($categories as $category)
                        <li class="mb-3 text-lg text-gray-800 normal-case font-secondary hover:opacity-80">
                            <button data-id={{ $category->id }}
                                class="category hover:opacity-50">{{ $category->name }}</button>
                        </li>
                    @endforeach
                    <li class="mb-3 text-gray-800 underline normal-case text-md font-secondary hover:opacity-80">
                        <button data-id='0' class="category all-categories"
                            class="hover:opacity-50">Show all categories</button>
                    </li>
                </ul>
            </div>
            <div>
                <div>
                    <x-typography.h3 class="mb-2 text-base text-start">Sort</x-typography.h3>
                    <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-30 mb-5"></div>
                </div>
                <ul class="flex flex-col gap-2 sm:flex-row">
                    <li class="">
                        <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                            data-name="name">Name</a>
                    </li>
                    <li>
                        <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                            data-name="artisan">Artisan</a>
                    </li>
                    <li>
                        <a class="block w-full px-4 py-2 text-center text-gray-800 normal-case border-2 cursor-pointer sort py-2text-lg font-secondary hover:opacity-80"
                            data-name="price">Price</a>
                    </li>
                </ul>
            </div>
            <x-button.primary-btn class="filter-btn">Apply filter</x-button.primary-btn>
        </div>
        <div class="xl:w-[75%]">
                <span
                    class="text-xl italic font-normal normal-case search-result p-7 font-secondary">{{ $products->count() <= 1 ? $products->count() . ' result' : $products->count() . ' results' }}
                    - "{{ $search ?? "All" }}"</span>
            <ul
                class="my-3 category-products md:flex md:flex-wrap md:justify-between lg:justify-start lg:gap-x-4 md:mx-6">
                @foreach ($products as $product)
                    @include('partials._category-product')
                @endforeach
            </ul>
        </div>
    </section>
</x-guest-layout>
