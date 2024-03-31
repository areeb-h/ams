@props(['action', 'itemName'])

<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true" type="button" class="flex gap-2 items-center p-2 bg-red-50 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-white" title="Delete {{ $itemName }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="stroke: red">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        <span class="text-[red] text-sm font-semibold mr-1">Delete the {{ ucfirst($itemName) }}</span>
    </button>

    <!-- Modal -->
    <div x-show="open"
         x-transition:enter="ease-out duration-100"
         x-transition:enter-start="opacity-10"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-10"
         class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none" style="display: none;">
        <div class="fixed w-auto max-w-3xl mx-auto my-6">
            <!-- Overlay -->
            <div class="fixed h-screen w-screen -inset-1 bg-gray-600 bg-opacity-50" @click="open = false"></div>

            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 md:p-5 text-center">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete the record?</h3>
                    <form method="POST" action="{{ $action }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button @click="open = false" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            No, cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
