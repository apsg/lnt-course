<?php
namespace App\Domains\Courses\Controllers;

use App\Domains\Courses\Models\Course;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::permissionView(auth()->user())
            ->orderBy('starts_at', 'ASC')
            ->get();

        return view('courses.index')->with(compact('courses'));
    }
}
