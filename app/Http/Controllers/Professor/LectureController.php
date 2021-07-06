<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Models\Lecture;
use App\Models\Course;
use App\Models\Professor;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::all();
        $professors = Professor::all();
        return view('professor.lectures.index', ['lectures' => $lectures, 'professors' => $professors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('professor_id', Auth::user()->professor->id)->get();
        return view('professor.lectures.create', ['courses' => $courses]);
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
            'name'             => 'required|string|min:2|max:255',
            'description'      => 'required|string|min:15',
            'video'            => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
            'pdf'              => 'required|file',  // pdf , word , powerpoint   |mimes:application/pdf,application/msword,application/vnd.ms-powerpoint'
            'course_id'        => 'required|exists:courses,id',
        ]);

        $lecture = new Lecture();
        $lecture->name = $request->name;
        $lecture->description = $request->description;
        $lecture->course_id = $request->course_id;

        //upload video
        $path = $request->file('video')->store('public/lectures');
        $url = Storage::url($path);
        $lecture->video = $url;

        //upload pdf
        $path = $request->file('pdf')->store('public/pdfs');
        $url = Storage::url($path);
        $lecture->pdf = $url;



        if ($lecture->save()) {
            request()->session()->flash('success', 'Lecture was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('lectures.index',  ['lecture' => $lecture]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecture = Lecture::find($id);
        return view('professor.lectures.show', ['lecture' => $lecture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = lecture::find($id);
        $courses = Course::all();
        return view('professor.lectures.edit', [
            'lecture'    => $lecture,
            'courses' => $courses
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
            'name'             => 'required|string|min:2|max:255',
            'description'      => 'required|string|min:15',
            'video'            => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
            'pdf'              => 'required|file',  // pdf , word , powerpoint   |mimes:application/pdf,application/msword,application/vnd.ms-powerpoint'
            'course_id'        => 'required|exists:courses,id',
        ]);

        $lecture = Lecture::findOrFail($id);
        $lecture->update($request->all());

        if ($lecture->save())
            request()->session()->flash('success', 'Lecture Was Updated Successfully.');
        else
            request()->session()->flash('danger', 'Something Went Wrong.');

        return redirect()->route('lectures.index', ['lecture' => $lecture]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::destroy($id);

        request()->session()->flash('danger', 'Lecture Was Deleted Successfully.');

        return redirect()->route('lectures.index');
    }
}
