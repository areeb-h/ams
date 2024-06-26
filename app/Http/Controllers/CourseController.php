<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
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

class CourseController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $perPage = $request['perPage']?? null;
        $courses = Course::paginate($perPage?? 5);

        return CourseResource::collection($courses);
    }

    public function show(Request $request, Course $course): JsonResponse
    {
        return response()->json($course);
    }
}
