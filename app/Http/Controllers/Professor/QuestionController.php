<?php

namespace App\Http\Controllers\Professor;

use Image;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view("professor.questions.index", ["questions" => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("professor.questions.create");
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
            'question_text'     => 'required|string|min:2|max:255',
            "score"             => 'required|Numeric',
        ]);


        $questions = Question::create($request->all());
        for ($q = 1; $q <= 4; $q++) {
            $options = $request->input('option_text' . $q, '');
            if ($options != '') {
                Option::create([
                    'question_id' => $questions->id,
                    'option_text' => $options,
                    'correct' => $request->input('correct' . $q)
                ]);
            }
        }
        if ($questions and $options) {

            request()->session()->flash('success', 'question and options were  created successfully.');
        } else {

            request()->session()->flash('danger', 'Something went wrong.');
        }

        return redirect()->route('questions.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $options = Option::where('id', $id)->get();
        return view("professor.questions.show", ["question" => $question, 'options' => $options]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view("professor.questions.edit", ["question" => $question]);
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
            'question_text' => 'required|string|min:2|max:255',
            "score"             => 'required|Numeric'
        ]);
        $question = Question::find($id);
        $question->update($request->only('question_text'));

        if ($question)
            request()->session()->flash('success', 'question was updated successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::destroy($id);
        request()->session()->flash('danger', 'question was Deleted successfully.');

        return redirect()->route('questions.index');
    }
}
