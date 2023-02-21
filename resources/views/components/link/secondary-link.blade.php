@props(['route'])

<li class="relative mb-5 text-2xl text-white top-10 hover:opacity-80">
    <a @click="menuIsOpen=false" href="{{$route}}">{{$slot}}</a>
    <div class="h-[1px] w-full bg-white mt-2 opacity-30"></div>
</li>