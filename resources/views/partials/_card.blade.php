
<article class="relative mx-6 mb-5 bg-gray-900 md:w-full md:mx-0 md:w-[calc(50%-1rem) lg:w-[calc(33%-1rem)]">
    <a href="products/?category={{$category->id}}" >
        <div class="transition-opacity bg-bottom bg-cover h-80 opacity-70 hover:opacity-60" style="background-image: url({{ asset('storage/' . $category->image) }})">
        </div>
        <div class="absolute flex flex-col mr-3 bottom-3 left-3">
            <span class="text-lg text-gray-50">Explore</span>
            <span class="mb-2 text-3xl font-medium text-gray-50">Handmade {{$category->name}}</span>
            <x-button.secondary-btn>View products</x-button.secondary-btn>
        </div>
    </a>
</article>