<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\Year;
use Illuminate\Database\Eloquent\Builder;
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
        $year_id = Year::where('id', Auth::user()->student->year_id)->get();
        $quizzes = Quiz::whereHas('course', function (Builder $query) use ($year_id) {
            $query->whereHas('semester', function (Builder $q) use ($year_id) {
                $q->where('year_id', Auth::user()->student->year_id);
            });
        })->get();
        return view('student.quizzes.index', ['quizzes' => $quizzes]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Quiz $quiz, Request $request)
    {
        $answers = [];
        $quiz_score = 0;
        $full_mark = 0;
        // $quiz = new Quiz();

        // Step 2
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = Option::where('question_id', $question_id)
                ->where('id', $answer_id)
                ->where('correct', 1)->count() > 0;
            $answers[] = [
                'question_id' => $question_id,
                'option_id' => $answer_id,
                'correct' => $correct
            ];
            // The Full mark of the Quiz
            $full_mark = $full_mark + $question->score;

            if ($correct) {
                $quiz_score += $question->score;
            }

            /*
             * Save the answer
             * Check if it is correct and then add points
             * Save all test result and show the points
             */
        }

        // Step 3
        $quiz_details = QuizResult::create([
            'quiz_id'     => $quiz->id,
            'user_id'     => Auth::user()->id,
            'quiz_result' => $quiz_score
        ]);

        // Step 4
        return view('student.results.show', ['quiz_details' => $quiz_details, 'full_mark' => $full_mark]);
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
        return view('student.quizzes.show', ['quiz' => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
