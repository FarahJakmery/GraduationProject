<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = Quiz::all();
        return view('professor.quizzes.index', ['quiz' => $quiz]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        $courses = Course::where('professor_id', Auth::user()->professor->id)->get();
        return view('professor.quizzes.create', ['courses' => $courses, "questions" => $questions]);
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
            'name'             => 'required|string|min:4|max:255',
            'course_id'       => 'required|exists:courses,id',
            "questions"            => "required|array"
        ]);


        $quiz = Quiz::create($request->all());
        $quiz->questions()->attach($request->questions);
        if ($quiz->save()) {
            request()->session()->flash('success', 'Quiz was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);

        return view('professor.quizzes.show', ['quiz' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Question::all();
        $courses = Course::all();
        $quiz = Quiz::find($id);
        return view('professor.quizzes.edit', ['quiz' => $quiz, 'courses' => $courses, "questions" => $questions]);
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
            'name'            => 'required|string|min:4|max:255',
            'course_id'       => 'required|exists:courses,id',
            "questions"       => "required|array"
        ]);

        $quiz = Quiz::find($id);
        $quiz->update($request->all());
        $quiz->questions()->sync($request->questions);

        if ($quiz->save())

            request()->session()->flash('success', 'quiz was created successfully.');
        else

            request()->session()->flash('danger', 'Something went wrong.');

        return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::destroy($id);

        request()->session()->flash('danger', 'quiz was Deleted successfully.');

        return redirect()->route('quizzes.index');
    }
}
