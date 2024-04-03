<?php

namespace App\Filament\Resources\StudySessionResource\Pages;

use App\Filament\Resources\StudySessionResource;
use App\Models\Attendance;
use App\Models\StudyGroup;
use App\Models\StudySession;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;

class CreateStudySession extends CreateRecord
{
    protected static string $resource = StudySessionResource::class;

//    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
//    {
//        $studySession = parent::handleRecordCreation($data);
//
//        $studyGroup = StudyGroup::findOrFail($data['study_group_id']);
//
//        $students = $studyGroup->students;
//        foreach ($students as $student) {
//            Attendance::create([
//                'study_session_id' => $studySession->id,
//                'student_id' => $student->id,
//                'attended' => 0,
//            ]);
//        }
//
//        return $studySession;
//    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $studySession = StudySession::create(Arr::except($data, ['student_ids']));

        $studyGroup = StudyGroup::find($data['study_group_id']);
        $studentIds = $studyGroup->students->pluck('id')->toArray();
        $studySession->students()->sync($studentIds);

        return $studySession;
    }
}
