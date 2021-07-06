<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;
use App\Models\Enroll;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Lecture;
use App\Models\Quiz;


class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descrption', 'logo',  'semester_id', "professor_id"];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
    // Get the semester that owns the course.

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    // Get the students that owns the course.
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    // Get the lectures that owns the course.
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
