<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = ['scientific_grade', 'scientific_certificate', 'user_id'];

    //Get the user that owns to professor.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Get the courses that owns to professor.
    public function courses()
    {
        return  $this->hasMany(Course::class);
    }
}
