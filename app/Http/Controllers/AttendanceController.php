<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceStoreRequest;
use App\Http\Requests\AttendanceUpdateRequest;
use App\Models\Attendance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function index(Request $request): View
    {
        $attendances = Attendance::all();

        return view('attendance.index', compact('attendances'));
    }

    public function create(Request $request): View
    {
        return view('attendance.create');
    }

    public function store(AttendanceStoreRequest $request): RedirectResponse
    {
        $attendance = Attendance::create($request->validated());

        $request->session()->flash('attendance.id', $attendance->id);

        return redirect()->route('attendances.index');
    }

    public function show(Request $request, Attendance $attendance): View
    {
        return view('attendance.show', compact('attendance'));
    }

    public function edit(Request $request, Attendance $attendance): View
    {
        return view('attendance.edit', compact('attendance'));
    }

    public function update(AttendanceUpdateRequest $request, Attendance $attendance): RedirectResponse
    {
        $attendance->update($request->validated());

        $request->session()->flash('attendance.id', $attendance->id);

        return redirect()->route('attendances.index');
    }

    public function destroy(Request $request, Attendance $attendance): RedirectResponse
    {
        $attendance->delete();

        return redirect()->route('attendances.index');
    }
}
