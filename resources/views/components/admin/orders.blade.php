@props(['collections', 'keys', 'orderItems', 'search', 'path'])
<section class="w-full px-10 bg-gray-100">
    <div class="flex justify-between h-[12.5vh] items-center w-full">
        {{-- Search bar --}}
        <x-admin.search :search=$search :path=$path />

        {{-- Display feedback message --}}
        <x-message.secondary-message />
    </div>

    {{-- Table --}}
    <div class="h-[87.5vh] overflow-scroll">
        <table class="relative w-full bg-white shadow">
            <thead>
                <tr class="bg-gray-200">
                    <th class="sticky top-0 px-5 py-5 pl-10 text-start bg-gray-50">@sortablelink('id')</th>
                    <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('user_id', 'User Id')</th>
                    <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('status')</th>
                    <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('total')</th>
                    <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('modified')</th>
                    <th class="sticky top-0 py-5 pr-5 text-start bg-gray-50">@sortablelink('created')</th>
                    <th class="sticky top-0 py-5 pr-3 text-start bg-gray-50 text-gray-50">Edit</th>
                    <th class="sticky top-0 py-5 text-start bg-gray-50 text-gray-50">Edit</th>
                </tr>
            </thead>
            @foreach ($collections as $collection)
                <tbody x-data="{ showOrderItems: false }">
                    <tr class="font-secondary normal-case font-light text-lg border-b border-gray-900/[0.10]">
                        <x-table.table-row class="pl-10">
                            {{ $collection->id }}
                        </x-table.table-row>
                        <x-table.table-row>{{ $collection->user_id }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->status }}</x-table.table-row>
                        <x-table.table-row class="max-w-[15rem]">{{ $collection->total }}€</x-table.table-row>
                        <x-table.table-row>{{ $collection->updated_at }}</x-table.table-row>
                        <x-table.table-row>{{ $collection->created_at }}</x-table.table-row>
                        <td>
                            <button class="p-1 px-3 bg-gray-100/[0.5] hover:bg-gray-200"
                                :class="[showOrderItems ? 'bg-gray-600  text-white' : '']"
                                @click="showOrderItems=!showOrderItems">+ show orders</button>
                        </td>
                        <td class="flex gap-3 mt-4">
                            <form method="POST" action="{{ route('order.destroy', $collection->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-gray-300 hover:text-red-300">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr class="text-sm italic font-medium text-gray-500 bg-gray-100 shadow font-secondary"
                        x-show="showOrderItems">
                        <td class="px-5 py-5 pl-10 text-start ">id</td>
                        <td class="py-5 pr-5 text-start ">product id</td>
                        <td class="py-5 pr-5 text-start ">name</td>
                        <td class="py-5 pr-5 text-start ">price</td>
                        <td class="py-5 pr-5 text-start ">quantity</td>
                        <td class="py-5 pr-5 text-start ">total</td>
                        <td class="py-5 pr-5 text-start "></td>
                        <td class="py-5 pr-5 text-start "></td>
                    </tr>
                    @foreach ($orderItems as $item)
                        @if ($collection->id === $item->order_id)
                            <tr class="text-gray-500 normal-case bg-gray-50 " x-show="showOrderItems"
                                class="font-secondary normal-case font-light text-lg border-b border-gray-900/[0.10]">
                                <x-table.table-row class="pl-10 ">{{ $item->id }}</x-table.table-row>
                                <x-table.table-row class="">{{ $item->product_id }}</x-table.table-row>
                                <x-table.table-row class="">{{ $item->name }}</x-table.table-row>
                                <x-table.table-row class="">{{ $item->price }}</x-table.table-row>
                                <x-table.table-row class="">{{ $item->quantity }}</x-table.table-row>
                                <x-table.table-row class="">{{ $item->total }}</x-table.table-row>
                                <x-table.table-row class=""></x-table.table-row>
                                <x-table.table-row class=""></x-table.table-row>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</section>
