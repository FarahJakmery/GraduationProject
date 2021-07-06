<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Year;


class Semester extends Model
{
    use HasFactory;
    protected $fillable = ["name", "year_id", 'photo'];

    //Get the course that owns to semester.

    public function courses()
    {
        return  $this->hasMany(Course::class);
    }
    //Get the years that owns to semester.

    public function year()
    {
        return  $this->belongsTo(Year::class);
    }
}
