<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudySessionStoreRequest;
use App\Http\Requests\StudySessionUpdateRequest;
use App\Models\StudySession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudySessionController extends Controller
{
    public function index(Request $request): View
    {
        $studySessions = StudySession::all();

        return view('studySession.index', compact('studySessions'));
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
