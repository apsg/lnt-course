<?php

namespace App\Domains\Courses\Controllers;

use App\Domains\Courses\Models\Course;
use App\Helpers\PermissionsHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

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

    public function publish(Course $course)
    {
        if (!Gate::allows('update', $course)) {
            return false;
        }

        $course->update([
            'published_at' => Carbon::now(),
        ]);

        return back();
    }
}
