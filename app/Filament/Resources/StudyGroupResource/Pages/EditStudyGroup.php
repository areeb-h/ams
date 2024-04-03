<?php

namespace App\Filament\Resources\StudyGroupResource\Pages;

use App\Filament\Resources\StudyGroupResource;
use App\Models\Course;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;
use Throwable;

class EditStudyGroup extends EditRecord
{
    protected static string $resource = StudyGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * @throws Throwable
     * @throws ValidationException
     */
    public function save(bool $shouldRedirect = true): void
    {
        $this->validate([
            'data.from_time' => 'required|date_format:H:i',
            'data.to_time' => ['required', 'date_format:H:i', 'after:data.from_time'],
        ], [
            'data.to_time.after' => 'The time must be after the start time.',
        ]);

//        // Grab the model instance from the Livewire component.
//        $studyGroup = $this->record;
//
//        // Apply the duration calculation.
//        $fromTime = Carbon::createFromFormat('H:i', $this->data['from_time']);
//        $toTime = Carbon::createFromFormat('H:i', $this->data['to_time']);
//        $duration = $fromTime->diffInMinutes($toTime);
//        $studyGroup->duration = $duration;
//
//        // Conditionally set the name based on the presence of course_id and absence of a name.
//        if (empty($this->data['name']) && !empty($this->data['course'])) {
//            $course = Course::find($this->data['course_id']);
//            if ($course) {
//                $formattedFromTime = $fromTime->format('H:i');
//                $formattedToTime = $toTime->format('H:i');
//                $studyGroup->name = "{$course->name} [{$formattedFromTime} to {$formattedToTime}]";
//            }
//        }

        // Since we've modified the model instance directly, we don't need to manually fill the form.
        // Just proceed with the regular save process which will persist the model changes.
        parent::save();

    }

}
