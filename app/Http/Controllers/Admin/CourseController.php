<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all();
        $professors = Professor::all();
        return view('admin.courses.create', ['semesters' => $semesters, 'professors' => $professors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|min:4|max:255',
            'logo'                  => 'required|file|image',
            'description'           => 'required|string|min:15',
            'professor_id'          => 'required|exists:professors,id',
            'semester_id'           => 'required|exists:semesters,id',

        ]);

        $file = $request->file('logo');
        $file = $file->store('Course-logo', 'public');

        $course               = new Course();
        $course->name         = $request->name;
        $course->description  = $request->description;
        $course->semester_id  = $request->semester_id;
        $course->professor_id = $request->professor_id;
        $course->logo         = Storage::url($file);
        $course->save();

        if ($course) {

            request()->session()->flash('success', 'course was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('courses.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.courses.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $course = Course::find($id);
        $professors = Professor::all();
        $semesters = Semester::all();
        return view('admin.courses.edit', [
            'professors'    => $professors,
            'semesters'    => $semesters,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|string|min:2|max:255',
            'logo'          => 'required|file|image',
            'description'   => 'required|string|min:15',
            'professor_id'  => 'required|exists:professors,id',
            'semester_id'   => 'required|exists:semesters,id',

        ]);

        $file = $request->file('logo');
        $file = $file->store('Course-logo', 'public');


        $course = Course::find($id);
        $course->update([
            'name'            => $request->name,
            'description'     => $request->description,
            'professor_id'    => $request->professor_id,
            'semester_id'     => $request->semester_id,
            'logo'            => Storage::url($file),
        ]);

        if ($course)
            request()->session()->flash('success', 'course was updated successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::destroy($id);

        request()->session()->flash('danger', 'course Was Deleted Successfully.');

        return redirect()->route('courses.index');
    }
}
