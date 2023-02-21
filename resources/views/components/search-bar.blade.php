<section class="bg-gray-100">
    <form x-show="searchIsOpen" x-cloak x-transition:enter.duration.500ms action="/products" class="relative lg:mx-auto 2xl:w-[90rem]">
        <img src="/svg/loupe.svg" class="absolute w-6 translate-y-1/2 left-4 bottom-1/2" alt="">
        <input class="w-full py-4 bg-gray-100 outline-none px-14" type="text" name="search" placeholder="SEARCH...">
        <img @click="searchIsOpen=false" src="/svg/close.svg" class="absolute w-4 translate-y-1/2 cursor-pointer right-5 bottom-1/2" alt="">
    </form>
</section>