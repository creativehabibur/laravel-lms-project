<?php


namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\EClass;
use Livewire\Component;

class CourseShow extends Component
{
    public $course_id;
    public function render()
    {
        $course= Course::with('e_class')->findOrFail($this->course_id);
        $class = EClass::where('course_id',$course->id)->get();
        $allClass = $class->sortBy('class_date');
        return view('livewire.course-show',['course' => $course,'allCass' => $allClass]);
    }
}
