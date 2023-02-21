@props(['title', 'image'])

<section {{ $attributes->merge(['class' => "relative bg-gray-800 mt-14"])}}>
    <div style="background-image: url({{ asset('storage/' . $image) }})" class="top-0 w-screen bg-center bg-cover h-[20rem] lg:h-[25rem] 2xl:h-[30rem] -z-10 opacity-60"></div>
    <div class="h-full">
        <div class="absolute flex flex-col items-center text-center -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
            <h1 class="w-screen mb-2 text-3xl font-medium px-7">{{$title}}</h1>
            <p class="max-w-2xl text-xl text-white font-lg px-7">{{$slot}}</p>
        </div>
    </div>
</section>