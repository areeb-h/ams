<x-filament::page>
    <div @class('flex flex-col gap-2 /items-center')>
        <h2 class="text-xl font-bold">{{ $studySession->studyGroup->course->first()->name }}</h2>
        <h2 class="text-sm font-bold">
            {{ $studySession->date->format('D') }} {{ $studySession->date->format('d/m/y') }}
            {{ $studySession->from_time->format('H:i') }}-{{ $studySession->to_time->format('H:i') }}
            {{ $studySession->studyGroup->location->code }}
        </h2>

    </div>

    <form method="POST" @class('flex flex-col gap-8') action="{{ route('filament.admin.resources.attendances.save-attendance', ['session' => $sessionId]) }}">
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
                        @if($attendances->where('student_id', $student->id)->first()?->attended)
                            <x-filament::badge :color="\Filament\Support\Colors\Color::Green">
                                {{ $attendances->where('student_id', $student->id)->first()?->attended ? 'Attended' : 'Absent' }}
                            </x-filament::badge>
                        @else
                            <x-filament::badge :color="\Filament\Support\Colors\Color::Red">
                                {{ $attendances->where('student_id', $student->id)->first()?->attended ? 'Attended' : 'Absent' }}
                            </x-filament::badge>
                        @endif

                        <x-filament::input.checkbox @class('p-3 rounded-md') name="attendance[{{ $student->id }}]" value="1"
                                                    :checked="$attendances->where('student_id', $student->id)->first()?->attended" />
                    </div>
                </div>
            @endforeach
        </div>

        <div @class('flex gap-4')>
            <x-filament::button :color="\Filament\Support\Colors\Color::Teal" type="submit">Save Attendance</x-filament::button>
            <x-filament::button :color="\Filament\Support\Colors\Color::Gray" :href="route('filament.admin.resources.attendances.index')" onclick="window.history.back()" type="button">Go Back</x-filament::button>
        </div>
    </form>
</x-filament::page>


