<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class UserAPIControlller extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $perPage = $request['perPage']?? null;
        $users = User::paginate($perPage?? 5);

        return response()->json($users);
    }

    public function show(Request $request, Course $course): JsonResponse
    {
        return response()->json($course);
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());
        return response()->json('success');
    }
}
