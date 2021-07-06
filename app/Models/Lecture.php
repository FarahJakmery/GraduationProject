<?php

namespace App\Models;


use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'course_id', 'video', 'pdf'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
