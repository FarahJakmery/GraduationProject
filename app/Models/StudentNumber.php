<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNumber extends Model
{
    use HasFactory;
    protected $fillable = ['student_number'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
