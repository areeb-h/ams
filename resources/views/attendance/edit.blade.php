@if($this->record->attendances->isNotEmpty())
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Student Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Attended
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($this->record->attendances as $attendance)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $attendance->student->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $attendance->attended ? 'Yes' : 'No' }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No attendances recorded.</p>
@endif
