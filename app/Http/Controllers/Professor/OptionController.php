<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::all();
        return view('professor.options.index', ['options' => $options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return view('professor.options.create', ['questions' => $questions]);
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
            'question_id'      => 'required|exists:questions,id',
            'option_text'      => 'required|string|min:2|max:255',
            'correct'          => 'required|boolean',
        ]);

        $options = Option::create([
            'option_text'     => $request->option_text,
            'correct'         => $request->correct,
            'question_id'     => $request->question_id,
        ]);

        if ($options->save()) {
            request()->session()->flash('success', 'option was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }

        return redirect()->route('options.index',  ['options' => $options]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = Option::find($id);
        return view('professor.options.show', ['option' => $option]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        $questions = Question::all();
        return view('professor.options.edit', [
            'option'    => $option,
            'questions' => $questions
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
            'question_id'      => 'required|exists:questions,id',
            'option_text'      => 'required|string|min:2|max:255',
            'correct'          => 'required|boolean',
        ]);

        $option = Option::findOrFail($id);

        $option->update($request->all());

        if ($option->save())
            request()->session()->flash('success', 'option was updated successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');

        return redirect()->route('options.index', ['option' => $option]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::destroy($id);

        request()->session()->flash('danger', 'Option Was Deleted Successfully.');

        return redirect()->route('options.index');
    }
}
