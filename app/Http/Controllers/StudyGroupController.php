<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyGroupStoreRequest;
use App\Http\Requests\StudyGroupUpdateRequest;
use App\Models\StudyGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudyGroupController extends Controller
{
    public function index(Request $request): View
    {
        $studyGroups = StudyGroup::all();

        return view('studyGroup.index', compact('studyGroups'));
    }

    public function create(Request $request): View
    {
        return view('studyGroup.create');
    }

    public function store(StudyGroupStoreRequest $request): RedirectResponse
    {
        $studyGroup = StudyGroup::create($request->validated());

        $request->session()->flash('studyGroup.id', $studyGroup->id);

        return redirect()->route('studyGroups.index');
    }

    public function show(Request $request, StudyGroup $studyGroup): View
    {
        return view('studyGroup.show', compact('studyGroup'));
    }

    public function edit(Request $request, StudyGroup $studyGroup): View
    {
        return view('studyGroup.edit', compact('studyGroup'));
    }

    public function update(StudyGroupUpdateRequest $request, StudyGroup $studyGroup): RedirectResponse
    {
        $studyGroup->update($request->validated());

        $request->session()->flash('studyGroup.id', $studyGroup->id);

        return redirect()->route('studyGroups.index');
    }

    public function destroy(Request $request, StudyGroup $studyGroup): RedirectResponse
    {
        $studyGroup->delete();

        return redirect()->route('studyGroups.index');
    }
}
