@props(['collections', 'keys', 'categories', 'search', 'path'])

<section class="w-full px-10 bg-gray-100">
    <div class="flex items-center justify-between h-[12.5vh] w-full">
        {{-- Search bar --}}
        <x-admin.search :search=$search :path=$path />

        {{-- Display feedback message --}}
        <x-message.secondary-message />

        {{-- Add product --}}
        <div x-data="{ isModalOpen: false }">
            <x-admin.button>Add product</x-admin.button>
            <x-admin.add-modal title="Add product" action="{{ route('product.store') }}">

                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-28">Category</x-form.primary-label>
                    <select class="bg-gray-200" name="category_id" value="{{ old('name') }}">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Artisan</x-form.primary-label>
                    <x-form.primary-input type="text" placeholder="" name="artisan" required
                        value="{{ old('artisan') }}" />
                    <x-input-error :messages="$errors->get('artisan')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Name</x-form.primary-label>
                    <x-form.primary-input type="text" placeholder="" name="name" value="{{ old('name') }}"
                        required />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Price</x-form.primary-label>
                    <x-form.primary-input placeholder="" name="price" value="{{ old('price') }}"
                         />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Stock</x-form.primary-label>
                    <x-form.primary-input type="number" placeholder="" name="stock" value="{{ old('stock') }}"
                        required />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Description</x-form.primary-label>
                    <x-form.primary-input type="text" placeholder="" name="description"
                        value="{{ old('description') }}" required />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Image</x-form.primary-label>
                    <div class="w-full">
                        <input type="file" placeholder="" value="" name="image" required>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>
                <x-button.primary-btn class="my-3">Create</x-button.primary-btn>
            </x-admin.add-modal>
        </div>
    </div>

    {{-- Table --}}
    <div class="h-[87.5vh] overflow-scroll">
        <table class="w-full bg-white shadow">
            <tr class="bg-gray-50">
                <th class="sticky top-0 px-5 py-5 pl-10 bg-gray-50 text-start">@sortablelink('id')</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">Category</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('artisan')</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('name')</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">Image</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">Description</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('price')</th>
                <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('stock')</th>
                <th class="sticky top-0 py-5 bg-gray-50 text-start text-gray-50">Edit</th>
            </tr>
            <div class="relative">
                @foreach ($collections as $collection)
                    <tr class="font-secondary normal-case font-light text-lg border-b border-gray-900/[0.10]">
                        <x-table.table-row class="pl-10">
                            {{ $collection->id }}
                        </x-table.table-row>
                        <x-table.table-row>{{ $categories->where('id', $collection->category_id)->first()->name }}
                        </x-table.table-row>
                        <x-table.table-row>{{ $collection->artisan }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->name }}</x-table.table-row>
                        <td class="w-2 h-2 py-2 pr-5">
                            <div class="w-10 h-10 bg-cover"
                                style="background-image: url({{ asset('storage/' . $collection->image) }})"></div>
                        </td>
                        <x-table.table-row class="max-w-[15rem]">{{ $collection->description }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->price }}€</x-table.table-row>
                        <x-table.table-row>{{ $collection->stock }}</x-table.table-row>
                        <td class="flex gap-3 mt-4">
                            {{-- Edit-row modal --}}
                            <div x-data="{ isModalOpen: false }">
                                <button @click="isModalOpen=true" class="text-gray-300 hover:text-gray-400">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <x-admin.update-modal title="Update product">
                                    <form method="POST" action="{{ route('product.update', $collection->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="flex flex-col w-full gap-4">
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-28">Category</x-form.primary-label>
                                                <select class="bg-gray-200" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Artisan</x-form.primary-label>
                                                <x-form.primary-input type="text" name="artisan" required
                                                    value="{{ $collection->artisan }}" />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Name</x-form.primary-label>
                                                <x-form.primary-input type="text" name="name" required
                                                    value="{{ $collection->name }}" />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Price</x-form.primary-label>
                                                <x-form.primary-input name="price" required
                                                    value="{{ $collection->price }}" />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Stock</x-form.primary-label>
                                                <x-form.primary-input type="number" name="stock" required
                                                    value="{{ $collection->stock }}" />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Description</x-form.primary-label>
                                                <x-form.primary-input type="text" name="description" required
                                                    value="{{ $collection->description }}" />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Image</x-form.primary-label>
                                                <div class="w-full">
                                                    <input type="file" value="{{ $collection->image }}"
                                                        name="image">
                                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                                </div>
                                            </div>
                                            <x-button.primary-btn class="my-3">Update</x-button.primary-btn>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('product.destroy', $collection->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="block w-full text-center text-red-600 hover:underline">
                                            Delete product
                                        </button>
                                    </form>
                                </x-admin.update-modal>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </div>
        </table>
    </div>
</section>
