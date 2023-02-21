<header x-data="{ searchIsOpen: false }" class="fixed top-0 z-50 w-full bg-white shadow">
    <div class="relative flex items-center justify-between py-4 px-6 lg:mx-auto 2xl:w-[90rem]">
        {{-- hamburger-menu --}}
        <div class="lg:hidden">
            <img id="open-mobile" class="cursor-pointer w-7" src="/svg/menu.svg" alt="">
            <x-menu.primary-menu id="mobile-menu" title="menu" class="z-50 bg-gray-900 mobile-menu">
                <ul class="flex flex-col justify-between h-screen px-6 pt-5">
                    <div>
                        <x-link.secondary-link route="{{ route('home') }}">Home</x-link.secondary-link>
                        <x-link.secondary-link route="{{ route('product.index') }}">Shop</x-link.secondary-link>
                        @if (!Auth::user())
                            <x-link.secondary-link route="{{ route('login') }}">Account</x-link.secondary-link>
                        @endif
                    </div>
                    @if (!Auth::user())
                        <div class="py-2 my-5 text-gray-200 w-fit hover:opacity-70">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a class="w-full font-medium" href="{{ route('admin.login') }}">Administrator</a>
                        </div>
                    @endif

                    @auth
                        <div class="px-4 py-2 my-5 text-gray-900 bg-gray-200 shadow hide w-fit">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <a class="w-full font-medium hover:underline" href="{{ route('logout') }}">Log out</a>
                        </div>
                    @endauth
                </ul>
            </x-menu.primary-menu>
        </div>

        {{-- dekstop menu --}}
        <ul class="hidden text-sm font-semibold text-gray-700 gap-7 lg:flex">
            <li><a class="hover:opacity-70" href="{{ route('home') }}">Home</a></li>
            <li><a class="hover:opacity-70" href="{{ route('product.index') }}">Shop</a></li>
            <li><a class="hover:opacity-70" href="{{ route('admin.login') }}">Admin</a></li>
        </ul>


        {{-- logo --}}
        <a class="absolute translate-x-1/2 right-1/2 " href="/">
            <img src="/svg/logo.svg" class="w-13" alt="">
        </a>

        <div class="flex items-center gap-3">
            @auth
                <a class="hidden text-lg font-light underline normal-case lg:block font-secondary"
                    href="{{ route('logout') }}">Log out</a>
            @endauth

            @if (!Auth::user())
                <a class="hidden text-lg font-light text-gray-600 normal-case hover:underline lg:block font-secondary"
                    href="{{ route('login') }}">
                    <img src="/svg/user.svg" class="w-7" alt="">
                </a>
            @endif

            {{-- search --}}
            <a href="#" @toggle="searchIsOpen=true">
                <img class="w-6" src="/svg/loupe.svg" @click="searchIsOpen=true" alt="">
            </a>

            {{-- cart --}}
            <div>
                <div class="relative">
                    <img id="cart-btn" class="cursor-pointer w-7" src="/svg/cart.svg" alt="">
                    @if (Cart::content()->count() >= 1)
                        <div
                            class="absolute flex items-center justify-center w-4 h-4 text-xs text-white bg-red-800 rounded-full z-100 -right-1 -bottom-1 font-secondary">
                            {{ Cart::content()->count() }}
                        </div>
                        @endif
                </div>

                <section id="cart"
                    class='fixed w-9/12 h-screen bg-white top-0 -right-[32rem] z-50 flex flex-col justify-between max-w-lg'>
                    <button class="absolute close-cart right-4 top-6">
                        <svg class="fill-gray-800" xmlns="http://www.w3.org/2000/svg" width="25.24" height="25.24" viewBox="0 0 25.24 25.24"> <path d="M462.5,57.4l-1.142-1.142L449.878,67.736,438.4,56.258,437.258,57.4l11.478,11.478L437.258,80.356,438.4,81.5,449.878,70.02,461.356,81.5l1.142-1.142L451.02,68.878Z" transform="translate(-437.258 -56.258)" opacity="0.67" /> </svg> </button>
                    <section class="z-30 px-8 mt-16">
                        <div>
                            <x-typography.h3 class="mb-2 text-start">Cart</x-typography.h3>
                            <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-30 mb-5"></div>
                        </div>
                        <ul class="h-[65vh] overflow-scroll">
                            @if ($cart->count() === 0)
                                <x-typography.h3
                                    class="absolute italic -translate-x-1/2 -translate-y-1/2 font-secondary top-1/2 left-1/2">
                                    Your cart is empty</x-typography.h3>
                            @endif
                            @foreach ($cart as $item)
                                @include('partials._order-item')
                            @endforeach
                        </ul>
                    </section>
                    @if ($cart->count() > 0)
                        <section class="px-8 mb-4">
                            <div class="h-[1px] w-full bg-gray-800 mt-2 opacity-10 mb-5"></div>
                            <div class="flex justify-between text-xl">
                                <span>Total</span>
                                <span>€{{ Cart::subtotal() }}</span>
                            </div>
                            <a class="block w-full py-3 my-4 font-medium text-center uppercase bg-gray-900 font-secondary text-gray-50 px-7 my-7 "
                                href="{{ route('checkout') }}">Checkout</a>
                        </section>
                    @endif
                </section>
                <div id="menu-bg"
                    class="fixed top-0 left-0 z-40 hidden w-screen h-screen bg-gray-900 opacity-0 mobile-bg filter-bg close">
                </div>
            </div>
        </div>
    </div>
    @include('components.search-bar')
</header>
