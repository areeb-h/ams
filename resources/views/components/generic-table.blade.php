@props(['headers', 'entities', 'fields', 'col_width' => []])

@php
    $totalSpan = array_sum($col_width) ?: count($fields) + 1;
@endphp


<div class="relative overflow-x-auto">
    <div class="min-w-max w-full text-sm text-left text-gray-500 flex flex-col gap-2">
        <div class="flex flex-wrap uppercase divide-x divide-gray-200 rounded-xl w-full text-xs font-semibold text-gray-700 /bg-gray-100/70">
            @foreach ($headers as $index => $header)
                @php
                    $widthFraction = isset($col_width[$index]) ? ($col_width[$index] / $totalSpan * 100) . '%' : (1 / count($headers) * 100) . '%';
                @endphp
                <div class="px-6 py-3" style="flex: 0 0 {{ $widthFraction }}; max-width: {{ $widthFraction }}">{{ $header }}</div>
            @endforeach
        </div>

        @foreach ($entities as $entity)
            <div class="flex items-center divide-x divide-gray-100 rounded-xl overflow-hidden bg-white w-full">
                @foreach ($fields as $index => $field)
                    @php
                        $widthFraction = isset($col_width[$index]) ? ($col_width[$index] / $totalSpan * 100) . '%' : (1 / count($fields) * 100) . '%';
                    @endphp
                    <div class="px-6 py-3" style="flex: 0 0 {{ $widthFraction }}; max-width: {{ $widthFraction }}">
                        {{ $entity->$field }}
                    </div>
                @endforeach
                    <div class="px-6 py-3 flex-auto" style="flex: 0 0 {{ (2 / $totalSpan * 100) . '%' }}; max-width: {{ (2 / $totalSpan * 100) . '%' }}">
                    <div class="flex space-x-2">
                        <button @click="$dispatch('open-edit-modal', { id: {{ $entity->id }} })"  class="p-2 rounded-xl hover:bg-gray-100 bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button @click="window.location.href='{{ route('dashboard.' . Str::plural(Str::snake(class_basename($entity))) . '.show', $entity->id) }}'" class="p-2 rounded-xl hover:bg-gray-100 bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $slot }}

    </div>
</div>
