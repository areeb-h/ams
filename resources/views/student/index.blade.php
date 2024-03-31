<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4 justify-between items-center" x-data="setup()">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Students') }}
            </h2>
            <button @click="$dispatch('open-create-modal')"
                    class="bg-green-500 px-4 py-2.5 text-sm font-semibold text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
            >
                New Student
            </button>
            <x-create-modal
                title="Student"
                actionRoute="{{ route('dashboard.students.store') }}"
                :fields="[
                            'name' => ['type' => 'text'],
                            'dob' => ['type' => 'date', 'label' => 'Date of Birth'],
                            'mobile' => ['type' => 'text'],
                            'address' => ['type' => 'text'],
                            'admission_date' => ['type' => 'date'],
                            'sid' => ['type' => 'text', 'label' => 'Student ID'],
                            'status' => ['type' => 'select', 'options' => ['1' => 'Active', '0' => 'Inactive']]
                        ]"
            />
        </div>
    </x-slot>

    <x-body-layout>

        <!-- Search and Create Button Container -->
        <div class="flex flex-wrap items-center justify-between rounded-xl mb-4">
            <!-- Search Bar -->

            <form class="max-w-md w-full">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-3.5 ps-10 text-sm text-gray-900 border border-gray-200 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-500 !important" placeholder="Search Students..." required />
                    <button type="submit" class="hidden">Search</button>
                </div>
            </form>

        </div>

        <div class="bg-gray-50 p-2 rounded-xl">
            <x-generic-table
                :headers="['sid', 'name', 'mobile', 'action']"
                :entities="$students"
                :fields="['sid', 'name', 'mobile']"
                :col_width="[1.5, 2, 2, 2]"
            >
                <!-- Modals for each student -->
                @foreach ($students as $student)
                    <x-edit-modal
                        :entity="$student"
                        actionRoute="{{ route('dashboard.students.update', $student->id) }}"
                        deleteRoute="{{ route('dashboard.students.destroy', $student->id) }}"
                        :fields="[
                            'name' => ['type' => 'text'],
                            'address' => ['type' => 'text'],
                            'mobile' => ['type' => 'text'],
                            'status' => ['type' => 'select', 'options' => ['1' => 'Active', '0' => 'Inactive']]
                        ]"
                    />
                @endforeach
            </x-generic-table>
        </div>
    </x-body-layout>
</x-app-layout>
