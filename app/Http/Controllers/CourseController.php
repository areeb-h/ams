<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $courses = Course::all();

//        $courses = Course::all()->map(function ($course) {
//            if ($course->course_image_url) {
//                $course->course_image_url = URL::to($course->course_image_url);
//            }
//            return $course;
//        });

//        $courses = Course::all()->map(function ($course) {
//            if ($course->course_image_url) {
//                $course->course_image_url = Storage::url($course->course_image_url);
//            }
//            return $course;
//        });
       return CourseResource::collection($courses);
    }

    public function show(Request $request, Course $course): JsonResponse
    {
        return response()->json($course);
    }
}
