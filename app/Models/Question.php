<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Option;
use App\Models\Quiz;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'question_text', 'score'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class);
    }
}
