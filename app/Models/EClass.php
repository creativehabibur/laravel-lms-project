<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EClass extends Model
{
    use HasFactory;
    public function notes(){
        $this->hasMany(Note::class);
    }

    public function homework(){
        $this->hasMany(Homework::class);
    }

    public function attendences(){
        $this->hasMany(Attendance::class);
    }
}
