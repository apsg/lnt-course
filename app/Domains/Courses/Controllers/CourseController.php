<?php

namespace App\Domains\Courses\Controllers;

use App\Domains\Courses\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::permissionView(auth()->user())
            ->orderBy('starts_at')
            ->get();

        return view('courses.index')->with(compact('courses'));
    }

    public function show(Course $course)
    {

    }

    public function edit(Course $course)
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }
}
