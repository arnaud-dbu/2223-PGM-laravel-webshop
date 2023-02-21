@props(['collections', 'search', 'path'])
<section class="w-full px-10 bg-gray-100">
    <div class="flex justify-between h-[12.5vh] items-center w-full">
        {{-- Search bar --}}
        <x-admin.search :search=$search :path=$path />

        {{-- Display feedback message --}}
        <x-message.secondary-message />

        {{-- Add category --}}
        <div x-data="{ isModalOpen: false }">
            <x-admin.button>Add category</x-admin.button>
            <x-admin.add-modal title="Add category" action="{{ route('category.store') }}">

                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Name</x-form.primary-label>
                    <x-form.primary-input type="text" placeholder="" name="name" value="{{ old('name') }}"
                        required />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Description</x-form.primary-label>
                    <x-form.primary-input type="text" placeholder="" name="description" required
                        value="{{ old('description') }}" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Image</x-form.primary-label>
                    <div class="w-full">
                        <input type="file" placeholder="" value="" name="image">
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
            <thead>
                <tr class="bg-gray-50">
                    <th class="sticky top-0 px-5 py-5 pl-10 bg-gray-50 text-start">@sortablelink('id')</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('name')</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('slug')</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">Image</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">Description</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('updated_at', 'modified')</th>
                    <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('created_at', 'created')</th>
                    <th class="sticky top-0 py-5 bg-gray-50 text-start text-gray-50">Edit</th>
                </tr>
            </thead>
            <div class="relative">
                @foreach ($collections as $collection)
                    <tr class="font-secondary normal-case font-light text-lg border-b border-gray-900/[0.10]">
                        <x-table.table-row class="pl-10">{{ $collection->id }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->name }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->slug }}</x-table.table-row>
                        <td class="w-2 h-2 py-2 pr-5">
                            <div class="w-10 h-10 bg-cover"
                                style="background-image: url({{ asset('storage/' . $collection->image) }})"></div>
                        </td>
                        <x-table.table-row class="max-w-[15rem]">{{ $collection->description }}</x-table.table-row>
                        <x-table.table-row class="max-w-[15rem]">{{ $collection->updated_at }}</x-table.table-row>
                        <x-table.table-row class="max-w-[15rem]">{{ $collection->created_at }}</x-table.table-row>
                        <td class="flex gap-3 mt-4">
                            {{-- Edit-row modal --}}
                            <div x-data="{ isModalOpen: false }">
                                <button @click="isModalOpen=true" class="text-gray-300 hover:text-gray-400">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <x-admin.update-modal title="Update category">
                                    <form method="POST" action="{{ route('category.update', $collection->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex flex-col w-full gap-4">
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Name</x-form.primary-label>
                                                <x-form.primary-input type="text"
                                                    placeholder="{{ $collection->name }}" name="name"
                                                    value="{{ $collection->name }}" required />
                                            </div>
                                            <div class="flex items-center gap-4">
                                                <x-form.primary-label class="w-40">Description</x-form.primary-label>
                                                <x-form.primary-input type="text"
                                                    placeholder="{{ $collection->description }}" name="description"
                                                    value="{{ $collection->description }}" required />
                                            </div>
                                            <div class="flex items-center gap-12">
                                                <x-form.primary-label class="w-40">Image</x-form.primary-label>
                                                <div>
                                                    <div class="w-40 h-40 mb-2 bg-center bg-cover"
                                                        style="background-image: url({{ asset('storage/' . $collection->image) }})">
                                                    </div>
                                                    <input type="file" value="{{ $collection->image }}"
                                                        name="image">
                                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                                </div>
                                            </div>
                                            <x-button.primary-btn class="w-full my-3">Update</x-button.primary-btn>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('category.destroy', $collection->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="block w-full text-center text-red-600 font-lg hover:underline">
                                            Delete category
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
