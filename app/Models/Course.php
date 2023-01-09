<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id'
    ];

    public function curriculumns() {
        return $this->hasMany(Curriculum::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function e_class(){
        return $this->hasMany(EClass::class);
    }
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class);
    }
    public function students(){
        return $this->belongsToMany(Course::class,'course_student','course_id','student_id');
    }
}
