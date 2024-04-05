<x-filament::page xmlns:x-filament="http://www.w3.org/1999/html">
    <form
        method="POST"
        @class('flex flex-col gap-8')
        action="{{ route('filament.admin.resources.attendances.create-attendance.save') }}"
    >
        @csrf

        <div>
            <label for="studyGroupSelector" class="block text-sm font-semibold">Select a Class</label>
            <select id="studyGroupSelector" name="study_group"
                    @class("mt-1 block w-full pl-3 pr-10 py-2 dark:bg-gray-900 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md")>
                <option value="">Select a Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="studentsContainer">
            <label class="block text-sm font-medium font-semibold">Select Students</label>
            <div @class(" mt-2 grid grid-cols-1 gap-y-2 sm:grid-cols-2 sm:gap-x-2") id="studentsList">
                <!-- Student list will be populated dynamically -->
            </div>
        </div>

        <div @class('flex gap-4')>
            <x-filament::button :color="\Filament\Support\Colors\Color::Teal" type="submit">Generate Sheet</x-filament::button>
            <x-filament::button :color="\Filament\Support\Colors\Color::Gray" onclick="goBack();" type="button">
                Go Back
            </x-filament::button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studyGroupSelector = document.getElementById('studyGroupSelector');
            const studentsContainer = document.getElementById('studentsList');

            studyGroupSelector.addEventListener('change', function() {
                const selectedClassId = studyGroupSelector.value;

                if (selectedClassId) {
                    // Fetch the students for the selected class via AJAX
                    fetchStudents(selectedClassId);
                } else {
                    studentsContainer.innerHTML = ''; // Clear student list if no class is selected
                }
            });

            function fetchStudents(selectedClassId) {
                fetch(`/dashboard/study-groups/${selectedClassId}/fetch-students`)
                    .then(response => response.json())
                    .then(data => {
                        // Clear previous student list
                        studentsContainer.innerHTML = '';

                        let index = 1;
                        // let data_length = data.length;

                        // Add checkboxes for each student
                        data.forEach(student => {
                            const label = document.createElement('label');
                            label.htmlFor = `student${student.id}`;
                            label.className = ' block text-sm pr-2';
                            label.textContent = index + ' | ' + student.name;

                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.id = `student${student.id}`;
                            checkbox.name = 'students[]';
                            checkbox.value = student.id;
                            checkbox.className = 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded';
                            checkbox.checked = true;

                            const div = document.createElement('div');
                            div.className = 'flex items-center gap-2 w-fit justify-between rounded-xl border p-2 px-3';
                            div.appendChild(label);
                            div.appendChild(checkbox);

                            studentsContainer.appendChild(div);

                            index += 1;
                        });
                    })
                    .catch(error => console.error('Error fetching students:', error));
            }
        });
    </script>
</x-filament::page>
