<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteController extends Controller
{
    public function index(Request $request): View
    {
        $student_count = count(Student::all());

        return view('website.index', compact('student_count'));
    }

    public function about(Request $request): View
    {
        return view('website.about');
    }
}
