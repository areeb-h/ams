<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <x-body-layout>
        {{ $slot }}
    </x-body-layout>
</x-app-layout>

