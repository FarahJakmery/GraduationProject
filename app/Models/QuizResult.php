<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'user_id', 'quiz_result'];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
