<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class SearchController extends Controller
{
    public function search(Request $request)

    {
        $courses = Course::where('name', 'like', "%$request->q%")->get();

        return view('student.search.index', ['courses' => $courses]);
    }
}
