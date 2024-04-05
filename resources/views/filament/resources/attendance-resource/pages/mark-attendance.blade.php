<x-filament::page xmlns:x-filament="http://www.w3.org/1999/html">
    <div @class('flex flex-col gap-2 /items-center')>
        <h2 class="text-xl font-bold">{{ $studySession->studyGroup->course->first()->name }}</h2>
        <h2 class="text-sm font-bold">
            {{ $studySession->date->format('D') }} {{ $studySession->date->format('d/m/y') }}
            {{ $studySession->from_time->format('H:i') }}-{{ $studySession->to_time->format('H:i') }}
            {{ $studySession->studyGroup->location->code }}
        </h2>

    </div>

    <form
        method="POST" @class('flex flex-col gap-8')
{{--        action="{{ route('filament.admin.resources.attendances.save-attendance', ['session' => $sessionId]) }}"--}}
        action="{{ route('filament.admin.resources.attendances.mark-attendance.save', ['record' => $sessionId]) }}"
    >
        @csrf
        <div @class('flex flex-col divide-y justify-center border rounded-xl //bg-white /dark:bg-slate-900')>
            @foreach($studySession->students as $student)
                <div @class('flex justify-between items-center divider-1 bg-green-600 py-4 px-4')>
                    <div @class('flex items-center gap-2')>
                        <x-filament::badge :color="\Filament\Support\Colors\Color::Gray">
                            {{ $loop->iteration }}
                        </x-filament::badge>
                        {{ $student->name }}
                    </div>


                    <div @class('flex gap-4 items-center')>
{{--                        @if($attendances->where('student_id', $student->id)->first()?->attended)--}}
{{--                            @if($attendances->where('student_id', $student->id)->first()?->status === 'late')--}}
{{--                                <x-filament::badge :color="\Filament\Support\Colors\Color::Orange">Late</x-filament::badge>--}}
{{--                            @endif--}}
{{--                            <x-filament::badge :color="\Filament\Support\Colors\Color::Green">--}}
{{--                                {{ $attendances->where('student_id', $student->id)->first()?->attended ? 'Attended' : 'Absent' }}--}}
{{--                            </x-filament::badge>--}}
{{--                        @else--}}
{{--                            <x-filament::badge :color="\Filament\Support\Colors\Color::Red">--}}
{{--                                {{ $attendances->where('student_id', $student->id)->first()?->attended ? 'Attended' : 'Absent' }}--}}
{{--                            </x-filament::badge>--}}
{{--                        @endif--}}
                            <div @class('flex gap-4 items-center')>
                                <div @class('p-2 rounded-full border')>
                                    <label @class('flex items-center cursor-pointer gap-1')>
                                        <div @class('text-xs font-medium text-gray-700 px-1')>Late</div>
                                        <div @class('relative')>
                                            <input type="checkbox" name="late[{{ $student->id }}]" value="1" @class('sr-only')
                                                {{ $attendances->where('student_id', $student->id)->first()?->status === 'late' ? 'checked="checked"' : '' }}>
                                            <div @class('w-8 h-4 bg-gray-200 rounded-full shadow-inner')></div>
                                            <div @class('dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition')></div>
                                        </div>
                                    </label>
                                </div>
                                <x-filament::input.checkbox
                                    @class('p-3 rounded-md') name="attendance[{{ $student->id }}]" value="1"
                                    :checked="$attendances->where('student_id', $student->id)->first()?->attended" />
                            </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div @class('flex gap-4')>
            <x-filament::button :color="\Filament\Support\Colors\Color::Teal" type="submit">Save Attendance</x-filament::button>
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

    <style>
        input:checked ~ .dot {
            transform: translateX(46%);
            background-color: #525252;
            /*background-color: #4B5563;*/
        }
        .dot {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</x-filament::page>




