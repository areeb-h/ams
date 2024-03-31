@props(['title', 'actionRoute', 'fields', 'deleteRoute'])

<div
    x-data="{ open: @json($errors->any()) }"
    @open-create-modal.window="open = true"
    x-show="open" class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog" aria-modal="true"
    style="display: none;"
    x-transition:enter="ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"></div>

        <!-- Modal Content -->
        <div class="inline-block overflow-hidden text-left transition-all transform bg-white sm:rounded-2xl shadow-2xl sm:max-w-lg w-full">
            <div class="bg-white">
                <div class="flex flex-col w-full">
                    <div class="border-b flex justify-between items-center p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-800" id="modal-title">Add New {{ $title }}</h3>
                        <button @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form x-ref="form" class="flex flex-col" action="{{ $actionRoute }}" method="POST" >
                        @csrf
                        @method('POST')
                        <div class="p-6 flex flex-col gap-4">
                            @foreach($fields as $field => $config)
                                <div class="flex flex-col gap-1">
                                    <label for="{{ $field }}" class="block text-sm font-semibold text-gray-500">
                                        @if(!empty($config['label']))
                                            {{ $config['label'] }}
                                        @else
                                            {{ ucwords(str_replace('_', ' ', $field)) }}
                                        @endif
                                    </label>
                                    @if($config['type'] === 'text')
                                        <input type="text" name="{{ $field }}" id="{{ $field }}" value="" class="block w-full h-10 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @elseif($config['type'] === 'date')
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                     aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     fill="currentColor"
                                                     viewBox="0 0 20 20"
                                                >
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input datepicker
                                                   type="text"
                                                   name="{{ $field }}"
                                                   id="{{ $field }}"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                   placeholder="Select date"
                                            />
                                        </div>
                                    @elseif($config['type'] === 'select')
                                        <select name="{{ $field }}" id="{{ $field }}" class="block h-10 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($config['options'] as $optionValue => $optionLabel)
                                                <option value="{{ $optionValue }}" {{ old($field) == $optionValue ? 'selected' : '' }}>
                                                    {{ $optionLabel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error($field)
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-row-reverse justify-between w-full bg-gray-50 p-6 shadow-sm">
                            <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-600 px-4 py-2.5 text-sm font-semibold text-white">
                                Submit
                            </button>
                            <div class="flex gap-2 text-gray-600">
                                <button @click="open = false" type="button" class="rounded-lg border bg-white border-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">Cancel</button>
                                <button @click="$refs.form.reset()" type="button" class="rounded-lg border bg-white border-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>

