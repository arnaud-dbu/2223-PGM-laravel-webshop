@props(['collections', 'keys', 'categories', 'search', 'path'])

<section class="w-full px-10 bg-gray-100 p-7">
    <div class="flex items-center justify-between w-full mb-5">
        {{-- Search bar --}}
        <x-admin.search :search=$search :path=$path />

        {{-- Display feedback message --}}
        <x-message.secondary-message />

        {{-- add user modal --}}
        <div x-data="{ isModalOpen: false }">
            <x-admin.button>Add user</x-admin.button>
            <x-admin.add-modal title="Add user" action="{{ route('user.store') }}">
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">First name</x-form.primary-label>
                    <div class="w-full">
                        <x-form.primary-input type="text" name="firstname" required />
                        <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Last name</x-form.primary-label>
                    <div class="w-full">
                        <x-form.primary-input type="text" name="lastname" required />
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">E-mail</x-form.primary-label>
                    <div class="w-full">
                        <x-form.primary-input type="email" name="email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Password</x-form.primary-label>
                    <div class="w-full">
                        <x-form.primary-input type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <x-form.primary-label class="w-40">Confirm password</x-form.primary-label>
                    <div class="w-full">
                        <x-form.primary-input type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
                <x-button.primary-btn class="my-3">Create</x-button.primary-btn>
            </x-admin.add-modal>
        </div>
    </div>

    {{-- table --}}
    <table class="w-full bg-white shadow">
        <tr class="bg-gray-50">
            <th class="sticky top-0 px-5 py-5 pl-10 bg-gray-50 text-start">@sortablelink('id')</th>
            <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('firstname')</th>
            <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('lastname')</th>
            <th class="sticky top-0 py-5 pr-5 bg-gray-50 text-start">@sortablelink('email')</th>
            <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('modified')</th>
            <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('created')</th>
            <th class="sticky top-0 bg-gray-50 text-gray-50">Edit</th>
        </tr>
        <div class="relative">
            @foreach ($collections as $collection)
                <tr class="font-secondary normal-case font-light text-lg border-b border-gray-900/[0.10]">
                    <x-table.table-row class="pl-10">
                        {{ $collection->id }}
                    </x-table.table-row>
                    <x-table.table-row>{{ $collection->firstname }}</x-table.table-row>
                    <x-table.table-row>{{ $collection->lastname }}</x-table.table-row>
                    <x-table.table-row class="max-w-[15rem]">{{ $collection->email }}</x-table.table-row>
                    <x-table.table-row class="max-w-[15rem]">{{ $collection->updated_at }}</x-table.table-row>
                    <x-table.table-row class="max-w-[15rem]">{{ $collection->created_at }}</x-table.table-row>
                    <td class="flex gap-3 mt-4">
                        {{-- Edit-row modal --}}
                        <div x-data="{ isModalOpen: false }">
                            <button @click="isModalOpen=true" class="text-gray-300 hover:text-gray-400">
                                <i class="fa-solid fa-pen"></i>
                            </button>

                            <x-admin.update-modal title="Update user">
                                <form method="POST" action="{{ route('user.update', $collection->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="flex flex-col w-full gap-4">
                                        <div class="flex items-center gap-4">
                                            <x-form.primary-label class="w-40">First name</x-form.primary-label>
                                            <x-form.primary-input type="text" name="firstname"
                                                value="{{ $collection->firstname }}" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <x-form.primary-label class="w-40">Last name</x-form.primary-label>
                                            <x-form.primary-input type="text" name="lastname"
                                                value="{{ $collection->lastname }}" required />
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <x-form.primary-label class="w-40">E-mail</x-form.primary-label>
                                            <div class="w-full">
                                                <x-form.primary-input type="email" name="email"
                                                    value="{{ $collection->email }}" required />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-button.primary-btn class="my-3">Update</x-button.primary-btn>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('user.destroy', $collection->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="block w-full text-center text-red-600 hover:underline">
                                        Delete User
                                    </button>
                                </form>
                            </x-admin.update-modal>
                        </div>
                    </td>
                </tr>
            @endforeach
        </div>
    </table>
</section>
