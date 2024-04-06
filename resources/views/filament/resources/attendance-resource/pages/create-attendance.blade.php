<x-filament::page xmlns:x-filament="http://www.w3.org/1999/html">
    <form
        method="POST"
        @class('flex flex-col gap-8')
        action="{{ route('filament.admin.resources.attendances.create-attendance.save') }}"
    >
        @csrf


        <div class="flex gap-3 items-end">
            <div class="w-full">
                <label for="studyGroupSelector" class="block text-sm font-semibold mb-2">Select a Class</label>
                <select id="studyGroupSelector" name="study_group"
                        class="mt-1 block w-full pl-3 pr-10 py-2 dark:bg-gray-900 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        wire:model="studyGroupId"
                        wire:change="fetchStudents($event.target.value)"
                >
                    <option value="">Select a Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}"  {{ $studyGroupId == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-28">
                <div class="text-sm font-bold">
                    {{ Carbon\Carbon::now()->format('D, d/m/y') }}
                </div>
            </div>
        </div>

        <div @class('flex flex-col divide-y justify-center border rounded-xl //bg-white /dark:bg-slate-900')>
            @foreach($students as $student)
                <div @class('flex gap-2 justify-between items-center divider-1 bg-green-600 py-5 px-4')>
                    <div @class('flex items-center gap-2')>
                        <x-filament::badge :color="\Filament\Support\Colors\Color::Gray">
                            {{ $loop->iteration }}
                        </x-filament::badge>
                        {{ $student->name }}
                    </div>

                    <div @class('flex gap-4 items-center')>
                        <div @class('flex gap-4 items-center')>
                            <x-filament::input.checkbox
                                @class('p-3 rounded-md') class="hidden" name="students[{{ $student->id }}]" value="{{ $student->id }}"
                                :checked="true"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div @class('flex gap-4')>
            <x-filament::button :color="\Filament\Support\Colors\Color::Teal" type="submit">Generate Sheet</x-filament::button>
            <x-filament::button :color="\Filament\Support\Colors\Color::Gray" onclick="goBack();" type="button">
                Go Back
            </x-filament::button>
        </div>
    </form>

    <script>
        function goBack() {
            window.location.href = "{{ route('filament.admin.resources.attendances.index') }}";
        }
    </script>

{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            const studyGroupSelector = document.getElementById('studyGroupSelector');--}}
{{--            const studentsContainer = document.getElementById('studentsList');--}}

{{--            studyGroupSelector.addEventListener('change', function() {--}}
{{--                const selectedClassId = studyGroupSelector.value;--}}

{{--                if (selectedClassId) {--}}
{{--                    fetchStudents(selectedClassId);--}}
{{--                } else {--}}
{{--                    studentsContainer.innerHTML = '';--}}
{{--                }--}}
{{--            });--}}

{{--            function fetchStudents(selectedClassId) {--}}
{{--                fetch(`/dashboard/study-groups/${selectedClassId}/fetch-students`)--}}
{{--                    .then(response => response.json())--}}
{{--                    .then(data => {--}}
{{--                        studentsContainer.innerHTML = '';--}}

{{--                        let index = 1;--}}

{{--                        data.forEach(student => {--}}
{{--                            const label = document.createElement('label');--}}
{{--                            label.htmlFor = `student${student.id}`;--}}
{{--                            label.className = ' block text-sm pr-2';--}}
{{--                            label.textContent = index + ' | ' + student.name;--}}

{{--                            const checkbox = document.createElement('input');--}}
{{--                            checkbox.type = 'checkbox';--}}
{{--                            checkbox.id = `student${student.id}`;--}}
{{--                            checkbox.name = 'students[]';--}}
{{--                            checkbox.value = student.id;--}}
{{--                            checkbox.className = ' focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded';--}}
{{--                            checkbox.checked = true;--}}

{{--                            const div = document.createElement('div');--}}
{{--                            div.className = 'flex gap-2 justify-between items-center divider-1 bg-green-600 py-4 px-4';--}}
{{--                            div.appendChild(label);--}}
{{--                            div.appendChild(checkbox);--}}

{{--                            studentsContainer.appendChild(div);--}}

{{--                            index += 1;--}}
{{--                        });--}}
{{--                    })--}}
{{--                    .catch(error => console.error('Error fetching students:', error));--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
</x-filament::page>
