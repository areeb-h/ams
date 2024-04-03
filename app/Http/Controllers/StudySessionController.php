<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudySessionStoreRequest;
use App\Http\Requests\StudySessionUpdateRequest;
use App\Models\StudySession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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

    public function saveAttendance(Request $request, $sessionId): RedirectResponse
    {
        try {
            $studySession = StudySession::findOrFail($sessionId);
            $attendanceStatus = $request->input('attendance'); // Expected to receive a single attendance status for all students

            foreach ($studySession->students as $student) {
                // Check if the student ID exists in the attendance data
                if (isset($attendanceStatus[$student->id])) {
                    // Update the attendance status for the student
                    $attended = $attendanceStatus[$student->id] === '1';
                    $studySession->students()->updateExistingPivot($student->id, ['attended' => $attended]);
                } else {
                    // If the student ID is not in the attendance data, mark them as absent
                    $studySession->students()->updateExistingPivot($student->id, ['attended' => false]);
                }
            }
            return redirect()->route('filament.resources.study-sessions.index')->with('success', 'Attendance updated successfully.');
        } catch (\Exception $e) {
            // Handle error, maybe log it and return with error message
            return redirect()->back()->with('error', 'Failed to update attendance.');
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
