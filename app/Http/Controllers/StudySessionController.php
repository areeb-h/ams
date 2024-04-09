<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudySessionStoreRequest;
use App\Http\Requests\StudySessionUpdateRequest;
use App\Models\Student;
use App\Models\StudyGroup;
use App\Models\StudySession;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class StudySessionController extends Controller
{
    public function index(Request $request): View
    {
        $studySessions = StudySession::all();

        return view('studySession.index', compact('studySessions'));
    }

//    public function saveAttendance(Request $request, $sessionId): RedirectResponse
//    {
//        try {
//            $studySession = StudySession::findOrFail($sessionId);
//            $attendances = $request->input('attendance', []); // Expected to receive ['student_id' => 'attended_status', ...]
//
//            foreach ($attendances as $studentId => $attendedStatus) {
//                // Update the attendance status for each student in the study session
//                $studySession->students()->updateExistingPivot($studentId, ['attended' => $attendedStatus]);
//            }
//
//            return redirect()->route('filament.resources.study-sessions.index')->with('success', 'Attendance updated successfully.');
//        } catch (\Exception $e) {
//            // Handle error, maybe log it and return with error message
//            return redirect()->back()->with('error', 'Failed to update attendance.');
//        }
//    }

    public function saveAttendance(Request $request, StudySession $record): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $attendanceStatuses = $request->input('attendance', []);
            $lateStatuses = $request->input('late', []);
            $studentIdsToUpdate = [];

            foreach ($record->students as $student) {
                $status = 'absent';
                if (isset($lateStatuses[$student->id]) && $lateStatuses[$student->id] == '1') {
                    $status = 'late';
                } elseif (isset($attendanceStatuses[$student->id]) && $attendanceStatuses[$student->id] == '1') {
                    $status = 'attended';
                }

                $record->students()->updateExistingPivot($student->id, [
                    'status' => $status,
                    'attended' => $status !== 'absent'
                ]);

                $studentIdsToUpdate[] = $student->id;
            }

            // Deduplicate student IDs to ensure we only update each student once
            $studentIdsToUpdate = array_unique($studentIdsToUpdate);

            // Trigger attendance score update for all affected students
            Student::whereIn('id', $studentIdsToUpdate)->each(function ($student) {
                $student->updateAttendanceDetails(); // Assuming this method updates the attendance score
            });

            DB::commit(); // Commit the transaction

            Notification::make()
                ->title('Success')
                ->body('Attendance updated successfully.')
                ->success()
                ->send();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()
                ->title('Failed')
                ->body('Failed to update attendance sheet. Error: ' . $e->getMessage())
                ->danger()
                ->send();
            return redirect()->back();
        }
    }

//    public function saveAttendance(Request $request, StudySession $record): RedirectResponse
//    {
//        try {
//            $attendanceStatuses = $request->input('attendance', []);
//            $lateStatuses = $request->input('late', []);
//
//            foreach ($record->students as $student) {
//                if (isset($lateStatuses[$student->id]) && $lateStatuses[$student->id] == '1') {
//                    $status = 'late';
//                } elseif (isset($attendanceStatuses[$student->id]) && $attendanceStatuses[$student->id] == '1') {
//                    $status = 'attended';
//                } else {
//                    $status = 'absent';
//                }
//
//                $record->students()->updateExistingPivot($student->id, ['status' => $status, 'attended' => $status !== 'absent']);
//            }
//
//            Notification::make()
//                ->title('Success')
//                ->body('Attendance updated successfully.')
//                ->success()
//                ->send();
//
//            return redirect()->route('filament.resources.study-sessions.index')->with('success', 'Attendance updated successfully.');
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'Failed to update attendance.');
//        }
//    }

    public function saveNewAttendance(Request $request)
    {
        DB::beginTransaction();

        try {
            $selectedGroupId = $request->input('study_group');
            $group = StudyGroup::findOrFail($selectedGroupId);

            $session = StudySession::create([
                'study_group_id' => $selectedGroupId,
                'date' => Carbon::now(),
                'from_time' => $group->from_time,
                'to_time' => $group->to_time,
            ]);

            $session->teachers()->attach(auth()->user()->teacher?? auth()->user());

            $studentIds = $request->input('students', []);
            $attendanceData = array_fill_keys($studentIds, ['status' => 'absent', 'attended' => false]);
            $session->students()->attach($attendanceData);

            Student::whereIn('id', $studentIds)->get()->each->updateAttendanceDetails();

            DB::commit();

            Notification::make()
                ->title('Success')
                ->body('New attendance sheet created successfully.')
                ->success()
                ->send();

            return redirect()->route('filament.admin.resources.attendances.mark-attendance', ['record' => $session->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            Notification::make()
                ->title('Failed')
                ->body('Failed to create new attendance sheet. Error: ' . $e->getMessage())
                ->danger()
                ->send();

            return redirect()->back();
        }
    }

//    public function saveNewAttendance(Request $request): RedirectResponse
//    {
//        try {
//            $selectedGroupId = $request->input('study_group');
//
//            $group = StudyGroup::findOrFail($selectedGroupId);
//
//            $session = StudySession::create([
//                'study_group_id' => $selectedGroupId,
//                'date' => Carbon::now(),
//                'from_time' => $group->from_time,
//                'to_time' => $group->to_time,
//            ]);
//
//            $session->studyGroup()->associate($group);
//            $session->teachers()->attach(auth()->user());
//            $session->save();
//
//            $studentIds = $request->input('students', []);
//
//            $attendanceData = [];
//            foreach ($studentIds as $studentId) {
//                $attendanceData[$studentId] = ['status' => 'absent', 'attended' => false];
//            }
//            $session->students()->attach($attendanceData);
//
//            Notification::make()
//                ->title('Success')
//                ->body('New attendance sheet created successfully.')
//                ->success()
//                ->send();
//
//            return redirect()->route('filament.admin.resources.attendances.mark-attendance', ['record' => $session->id]);
//        } catch (\Exception $e) {
//            Notification::make()
//                ->title('Failed')
//                ->body('Failed to create new attendance sheet.')
//                ->danger()
//                ->send();
//
//            return redirect()->back();
//        }
//    }

    public function create(Request $request): View
    {
        return view('studySession.create');
    }

    public function store(StudySessionStoreRequest $request): RedirectResponse
    {
        $studySession = StudySession::create($request->validated());

        $request->session()->flash('studySession.id', $studySession->id);

        return redirect()->route('studySessions.index');
    }

    public function show(Request $request, StudySession $studySession): View
    {
        return view('studySession.show', compact('studySession'));
    }

    public function edit(Request $request, StudySession $studySession): View
    {
        return view('studySession.edit', compact('studySession'));
    }

    public function update(StudySessionUpdateRequest $request, StudySession $studySession): RedirectResponse
    {
        $studySession->update($request->validated());

        $request->session()->flash('studySession.id', $studySession->id);

        return redirect()->route('studySessions.index');
    }

    public function destroy(Request $request, StudySession $studySession): RedirectResponse
    {
        $studySession->delete();

        return redirect()->route('studySessions.index');
    }
}
