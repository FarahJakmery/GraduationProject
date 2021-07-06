<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lecture;
use App\Models\Question;
use App\Models\Course;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ["name", "course_id"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function quizresults()
    {
        return $this->hasMany(QuizResult::class);
    }
}
