<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course-index',['courses'=>$courses]);
    }

    public function courseDelete($id){
        $course = Course::findOrFail($id);
        Storage::delete('public/'.$course->image);
        $course->delete();

        flash()->addSuccess('Course Delete Successfully!');
    }
}
