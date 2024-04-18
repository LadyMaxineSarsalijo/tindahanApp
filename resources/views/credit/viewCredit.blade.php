<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(':creditor Credit', ['creditor' => $credit->name]) }}
        </h2>
    </x-slot>
    <div class = "flex">
        <div class="flex-1 p-2">
            <div class="w-full overflow-y-auto shadow-md sm:rounded-lg bg-white mt-2 scrollbar-none ml-2">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class = "text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created By
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditProducts as $index => $credProd)
                        <tr class="{{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-100 dark:bg-gray-700' }} border-b">
                            <div>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    {{$credProd->product->name}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    ₱{{$credProd->product->price}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    {{$credProd->quantity}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    ₱{{$credProd->total}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    {{$credProd->created_by}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis text-center">
                                    {{ $credProd->created_at->format('m-d-Y') }}
                                </td>
                            </div>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>  
            </div>
        </div>
</x-app-layout>

