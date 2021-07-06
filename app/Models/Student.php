<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'year_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsTomany(Course::class);
    }
    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
