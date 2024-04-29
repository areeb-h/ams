<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\StudentResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class StudentAPIControlller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request): JsonResponse
    {
        $query = Student::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('sid', 'like', "%{$search}%");
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($sortBy = $request->input('sortBy') && $sortDirection = $request->input('sortDirection', 'asc')) {
            $query->orderBy($sortBy, $sortDirection);
        }

        $perPage = $request->input('perPage', 5);
        $students = $query->paginate($perPage);

        return StudentResource::collection($students)->response();
    }

    /**
     * @throws AuthorizationException
     */
    public function store(StudentStoreRequest $request): JsonResponse
    {
        $this->authorize('create');

        Student::create($request->validated(), ['status' => 'active']);
        return response()->json('success');
    }

    /**
     * @throws AuthorizationException
     */
    public function update(StudentUpdateRequest $request, Student $student): JsonResponse
    {
        $this->authorize('update', $student);

        $student->update($request->validated());
        return response()->json('success');
    }

    public function destroy(Request $request, Student $student): JsonResponse
    {
        $student->delete();
        return response()->json('success');
    }
}
