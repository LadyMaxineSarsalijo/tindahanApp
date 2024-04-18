<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class = "flex">
                <button id="addCreditBtn" class="bg-green-500 w-15 px-4 py-2 leading-none rounded-md hover:bg-green-200 transition ease-in-out duration-300 mb-2 mt-2">
                    Add Credit
                </button>
                <button id="addCreditorBtn" class="ml-2 bg-green-200 w-15 px-4 py-2 leading-none rounded-md hover:bg-green-200 transition ease-in-out duration-300 mb-2 mt-2">
                    Add Creditor
                </button>

                <button id="addProductBtn" class="ml-2 bg-green-200 w-15 px-4 py-2 leading-none rounded-md hover:bg-green-200 transition ease-in-out duration-300 mb-2 mt-2">
                    Add Product
                </button>
            </div>
        </h2>
    </x-slot>
    <div class = "flex">
        <div class="flex-1 p-2">
            <div class="overflow-y-auto shadow-md sm:rounded-lg bg-white mt-2 scrollbar-none ml-2">
                <!-- Overlay -->
                <form method="POST" action="{{route('addCreditProduct')}}">
                    @csrf
                    <div id="overlay_credit_product" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden">
                        <div class="flex items-center justify-center h-full">
                            <div class="bg-white p-8 rounded-lg shadow-xl relative">
                                <button id="closeCreditProductOverlay" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                                <h3 class="text-lg font-semibold mb-4">Add Credit</h3>
                                <div class="mb-4">
                                    <label for="creditorID" class="block text-sm font-medium text-gray-700">Creditor:</label>
                                    <select name="creditorID" class="block w-full" required>
                                        <option hidden>Select Creditor</option>
                                        @foreach ($creditors as $creditor)
                                            <option value="{{ $creditor->id }}" required>{{ $creditor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="product" class="block text-sm font-medium text-gray-700">Product:</label>
                                    <select name="productID" class="block w-full" >
                                        <option hidden class ="mt-1 p-2 border rounded-md w-full">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" required>
                                                            {{ $product->name }}
                                                    </option>
                                                @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                                    <input type="number" id="quantity" name="quantity" class="mt-1 p-2 border rounded-md w-full" required>
                                </div>
                                    <div class="text-right">
                                        <button id="" type= "submit" class="px-4 py-2 bg-gray-300 rounded-md text-gray-700">Add</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class = "w-full text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Creditor's Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Balance
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($creditors as $index => $creditor)
                        <tr class="{{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-100 dark:bg-gray-700' }} border-b">
                            <div>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    {{$creditor->name}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    ₱{{$creditor->balance}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    <div class="flex justify-between lg:justify-end">
                                        <form
                                            action="{{route('creditProduct', ['id' => $creditor->id])}}">
                                            <button type="submit"
                                                class="bg-green-500 mx-1 w-15 px-4 py-2 leading-none rounded-md hover:bg-green-200 transition ease-in-out duration-300">
                                                View
                                            </button>
                                        </form>
                                        <form
                                            action="">
                                            <button type="submit"
                                                class="bg-indigo-500 mx-1 w-15 px-4 py-2 leading-none rounded-md hover:bg-indigo-200 transition ease-in-out duration-300">
                                                Edit
                                            </button>
                                        </form>
                                        <form
                                            action="">
                                            <button type="submit"
                                                class="bg-red-500 mx-1 w-15 px-4 py-2 leading-none rounded-md hover:bg-red-200 transition ease-in-out duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </div>
                        </tr>
                        
                        @endforeach
                        
                    </tbody>
                </table>  
            </div>
        </div>
        <div class="flex-1 p-2">
            <div class="overflow-y-auto shadow-md sm:rounded-lg bg-white mt-2 scrollbar-none ml-2">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class = "text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                        <tr class="{{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-100 dark:bg-gray-700' }} border-b">
                            <div>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    {{$product->name}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    ₱{{$product->price}}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                    <div class="flex justify-between lg:justify-end">
                                        <form
                                            action="">
                                            <button type="submit"
                                                class="bg-indigo-500 mx-1 w-15 px-4 py-2 leading-none rounded-md hover:bg-stone-300 transition ease-in-out duration-300">
                                                Edit
                                            </button>
                                        </form>
                                        <form
                                            action="">
                                            <button type="submit"
                                                class="bg-red-500 mx-1 w-15 px-4 py-2 leading-none rounded-md hover:bg-stone-300 transition ease-in-out duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </div>
                        </tr>
                        
                        @endforeach
                        
                    </tbody>
                </table>  
            </div>
        </div>
        <div id="overlay_creditor" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden">
            <div class="flex items-center justify-center h-full">
                <div class="bg-white p-8 rounded-lg shadow-xl relative">
                    <button id="closeCreditorOverlay" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <form method="POST" action="{{ route('addCreditor') }}">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Creditor Name') }}" />
                            <x-input id="name" class="w-full rounded-md border border-[#e0e0e0] py-2 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" name="name" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                
                            <x-button class="ms-4">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="overlay_product" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden">
            <div class="flex items-center justify-center h-full">
                <div class="bg-white p-8 rounded-lg shadow-xl relative">
                    <button id="closeProductOverlay" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <form method="POST" action="{{route('addProduct')}}">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Product Name') }}" />
                            <x-input id="name" class="w-full rounded-md border border-[#e0e0e0] py-2 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" name="name" required />
                        </div>
                        <div>
                            <x-label for="price" value="{{ __('Price') }}" />
                            <x-input id="price" class="w-full rounded-md border border-[#e0e0e0] py-2 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" name="price" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                
                            <x-button class="ms-4">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>
<script>
    const addCreditBtn = document.getElementById('addCreditBtn');
    const addCreditorBtn = document.getElementById('addCreditorBtn');
    const addProductBtn = document.getElementById('addProductBtn');
    const overlayCreditProduct = document.getElementById('overlay_credit_product');
    const overlayCreditor = document.getElementById('overlay_creditor');
    const overlayProduct = document.getElementById('overlay_product');
    const closeCreditProductOverlayBtn = document.getElementById('closeCreditProductOverlay');
    const closeCreditorOverlayBtn = document.getElementById('closeCreditorOverlay');
    const closeProductOverlayBtn = document.getElementById('closeProductOverlay');

    // Function to show the overlay
    function showOverlay(overlay) {
        overlay.classList.remove('hidden');
    }

    // Function to hide the overlay
    function hideOverlay(overlay) {
        overlay.classList.add('hidden');
    }

    // Add event listener to show the credit product overlay when Add Credit button is clicked
    addCreditBtn.addEventListener('click', () => showOverlay(overlayCreditProduct));

    // Add event listener to show the creditor overlay when Add Creditor button is clicked
    addCreditorBtn.addEventListener('click', () => showOverlay(overlayCreditor));

    // Add event listener to show the product overlay when Add Product button is clicked
    addProductBtn.addEventListener('click', () => showOverlay(overlayProduct));

    closeCreditProductOverlayBtn.addEventListener('click', () => hideOverlay(overlayCreditProduct));
    closeCreditorOverlayBtn.addEventListener('click', () => hideOverlay(overlayCreditor));
    closeProductOverlayBtn.addEventListener('click', () => hideOverlay(overlayProduct));

</script>
