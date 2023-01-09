<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function e_class(){
        return $this->hasMany(EClass::class);
    }
    public function teachers(){
        return $this->belongsToMany(User::class,'course_teacher','course_id','teacher_id');
    }
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    public function students(){
        return $this->belongsToMany(Course::class,'course_student','course_id','student_id');
    }
}
