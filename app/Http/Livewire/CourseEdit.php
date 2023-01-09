<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\EClass;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseEdit extends Component
{
    use WithFileUploads;
    public $days = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];
    public $course_id;
    public $course_name;
    public $course_image;
    public $price;
    public $description;
    public $selectedDays = [];
    public $selectedTeachers = [];
    public $duration;
    public $end_date;
    public $deleteImage;



    public function mount(){

        $course = Course::findOrFail($this->course_id);
        $this->course_name = $course->name;
        $this->course_image = $course->image;
        $this->deleteImage= $course->image;
        $this->price =  $course->price;
        $this->description = $course->description;
        $this->selectedTeachers = $course->teachers()->pluck('users.id')->toArray();

    }
    protected $rules = [
        'course_name' => 'required',
        'course_image' => 'required',
        'price' => 'required',
        'description' => 'required|min:150',
        'selectedTeachers' => 'required',
    ];
    public function render()
    {
        $teachers = User::Role('Teacher')->get();
        return view('livewire.course-edit',['teachers' => $teachers]);
    }

    public function courseEdit(){
        $this->validate();
        $filename = time().$this->course_image->getClientOriginalName();
        $path = $this->course_image->storeAs('photos',$filename, 'public');
        $course = Course::findOrFail($this->course_id);
        $course->name = $this->course_name;
        $course->description = $this->description;
        $course->image = $path;
        $course->price = $this->price;
        $course->save();
        if (!empty($this->deleteImage)){
            Storage::delete('public/'.$this->deleteImage);
        }
        $course->teachers()->sync($this->selectedTeachers);

        if (!empty($this->selectedDays) && !empty($this->end_date && $this->duration)){
            $course->e_class()->delete();
            $start_date = new DateTime(now());
            $end_date =   new DateTime($this->end_date);
            $interval =  new DateInterval('P1D');
            $date_range = new DatePeriod($start_date, $interval, $end_date);
            $classNum = 0;
            foreach ($this->selectedDays as $slelectedDay) {
                foreach ($date_range as $date) {
                    if($date->format("l") == $slelectedDay){
                        $classNum++;
                        $eClass = new EClass();
                        $eClass->number = $classNum;
                        $eClass->class_date = $date;
                        $eClass->class_duration = $this->duration;
                        $eClass->course_id = $course->id;
                        $eClass->save();
                    }
                }
            }
        }

        flash()->addSuccess('Course Updated Successfully!');

    }
}
