<?php
namespace App\Domains\Courses\Controllers;

use App\Domains\Courses\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class ListCourseController extends Controller
{
    public function index()
    {
        $courses = Course::permissionView(auth()->user())
            ->orderBy('starts_at', 'ASC')
            ->get();

        return view('kursy.index')->with(compact('courses'));
    }

    public function show(Course $course)
    {
        return view('kursy.show')->with(compact('course'));
    }

    public function datatable(Request $request)
    {
        $length = $request->input('length');
        $sortBy = $request->input('column');
        $orderBy = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Course::with('user')
            ->forType($request->input('type'))
            ->forChoragiew($request->input('choragiew'))
            ->eloquentQuery($sortBy, $orderBy, $searchValue, []);
        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
    }
}
