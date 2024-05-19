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

//    /**
//     * @throws Throwable
//     * @throws ValidationException
//     */
//    public function save(bool $shouldRedirect = true): void
//    {
//        $this->validate([
//            'data.from_time' => 'required|date_format:H:i',
//            'data.to_time' => ['required', 'date_format:H:i', 'after:data.from_time'],
//        ], [
//            'data.to_time.after' => 'The time must be after the start time.',
//        ]);
//        parent::save();
//    }

}
