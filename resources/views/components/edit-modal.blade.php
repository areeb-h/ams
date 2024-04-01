@props(['entity', 'actionRoute', 'fields', 'deleteRoute'])

<div
    x-data="{ open: false,  id: {{ $entity->id }} }"
    @open-edit-modal.window="open = $event.detail.id === id"
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
        <div class="inline-block overflow-hidden text-left transition-all transform bg-white sm:rounded-2xl /m-4 /max-w-screen shadow-2xl sm:max-w-lg w-full">
            <div class="bg-white">
                <div class="flex flex-col w-full">
                    <div class="border-b flex justify-between items-center p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-800" id="modal-title">Edit {{ ucwords(str_replace('_', ' ', class_basename($entity))) }}</h3>
                        <button @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form class="flex flex-col" action="{{ $actionRoute }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6 flex flex-col gap-4">
                            @foreach($fields as $field => $config)
                                <div>
                                    <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $config['label'] ?? $field)) }}</label>
                                    @if($config['type'] === 'text')
                                        <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $entity->$field) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @elseif($config['type'] === 'select')
                                        <select name="{{ $field }}" id="{{ $field }}" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($config['options'] as $optionValue => $optionLabel)
                                                <option value="{{ $optionValue }}" @if(old($field, $entity->$field) == $optionValue) selected @endif>{{ $optionLabel }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-row-reverse justify-between w-full bg-gray-50 p-6 shadow-sm">
                            <button type="submit" class="rounded-lg bg-green-500 hover:bg-green-600 px-4 py-2.5 text-sm font-semibold text-white">Save</button>
                            <button @click="open = false" type="button" class="rounded-lg border bg-white border-gray-200 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50">Cancel</button>
                        </div>
                    </form>

                    <div class="flex w-full p-6 justify-between">
                        <x-delete-button :action="$deleteRoute" itemName="student" />
                        <form action="{{ route('dashboard.students.toggleStatus', $entity) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-50 font-semibold">
                                @if($entity->status == 1)
                                    Deactivate (Currently Active)
                                @else
                                    Activate (Currently Inactive)
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>
