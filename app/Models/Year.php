<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'photo'];

    public function users()
    {
        return $this->belongsTomany(User::class);
    }
    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
