<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    public function create(Request $request): View
    {
        return view('student.create');
    }

    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $student = Student::create($request->validated());

        $request->session()->flash('student.id', $student->id);

        return redirect()->route('dashboard.students.index')->with('success', 'Data saved successfully!');
    }

    public function show(Request $request, Student $student): View
    {
        return view('student.show', compact('student'));
    }

    public function edit(Request $request, Student $student): View
    {
        return view('student.edit', compact('student'));
    }

    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        session()->flash('success', 'Student information updated successfully.');

        return redirect()->route('dashboard.students.index');
    }

    public function destroy(Request $request, Student $student): RedirectResponse
    {
        $student->delete();

        session()->flash('danger', 'Student record deleted successfully.');

        return redirect()->route('students.index');
    }

    public function toggleStatus(Request $request, Student $student): RedirectResponse
    {
        // Toggle the status
        $student->status = $student->status == 0 ? 1 : 0;
        $student->save();

        // Flash a success message to the session
        session()->flash('success', 'Student status toggled successfully.');

        // Redirect back to the students index page or wherever you'd like
        return redirect()->route('dashboard.students.index');
    }
}
