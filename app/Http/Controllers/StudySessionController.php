<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudySessionStoreRequest;
use App\Http\Requests\StudySessionUpdateRequest;
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

    public function fetchStudents(StudyGroup $studyGroup): \Illuminate\Http\JsonResponse
    {
        $students = $studyGroup->students;

        return response()->json($students);
    }

    public function saveAttendance(Request $request, StudySession $record): RedirectResponse
    {
        try {
            $attendanceStatuses = $request->input('attendance', []);
            $lateStatuses = $request->input('late', []);

            foreach ($record->students as $student) {
                if (isset($lateStatuses[$student->id]) && $lateStatuses[$student->id] == '1') {
                    $status = 'late';
                } elseif (isset($attendanceStatuses[$student->id]) && $attendanceStatuses[$student->id] == '1') {
                    $status = 'attended';
                } else {
                    $status = 'absent';
                }

                $record->students()->updateExistingPivot($student->id, ['status' => $status, 'attended' => $status !== 'absent']);
            }

            Notification::make()
                ->title('Success')
                ->body('Attendance updated successfully.')
                ->success()
                ->send();

            return redirect()->route('filament.resources.study-sessions.index')->with('success', 'Attendance updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update attendance.');
        }
    }

    public function saveNewAttendance(Request $request): RedirectResponse
    {
        try {
            $selectedGroupId = $request->input('study_group');

            $group = StudyGroup::findOrFail($selectedGroupId);

            $session = StudySession::create([
                'study_group_id' => $selectedGroupId,
                'date' => Carbon::now(),
                'from_time' => Carbon::now(),
                'to_time' => Carbon::now(),
            ]);

            $session->studyGroup()->associate($group);
            $session->teachers()->attach(auth()->user());
            $session->save();

            $studentIds = $request->input('students', []);

            $attendanceData = [];
            foreach ($studentIds as $studentId) {
                $attendanceData[$studentId] = ['status' => 'absent', 'attended' => false];
            }
            $session->students()->attach($attendanceData);

            Notification::make()
                ->title('Success')
                ->body('New attendance sheet created successfully.')
                ->success()
                ->send();

            return redirect()->route('filament.admin.resources.attendances.mark-attendance', ['record' => $session->id]);
            // return redirect()->route('filament.resources.study-sessions.index');
        } catch (\Exception $e) {
            Notification::make()
                ->title('Success')
                ->body('Failed to create new attendance sheet.')
                ->danger()
                ->success()
                ->send();

            return redirect()->back();
        }
    }

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
