<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Lead;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Admission extends Component
{
    public $search;
    public $lead_id;
    public $leads = [];
    public $course_id;
    public $payment;
    public $selectedCourse;
    public function render()
    {
        $courses = Course::all();
        return view('livewire.admission',['courses' => $courses]);
    }

    public function search(){
        $leads = Lead::where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orWhere('phone','like','%'.$this->search.'%')->get();

        $this->leads = $leads;
    }

    public function selectLead(){
        $course = Course::findOrFail($this->course_id);

        $this->selectedCourse = $course;
    }

    public function admissionSubmit(){
        $lead = Lead::findOrFail($this->lead_id);

        $user = new User();

        $user->name = $lead->name;
        $user->email = $lead->email;
        $user->password = Hash::make('123456');

        $user->save();
        $lead->delete();


        //Create Invoice
        $invoice = new Invoice();
        $invoice->due_date = now()->addDays(7);
        $invoice->user_id = $user->id;
        $invoice->save();

        $invoiceItem = new InvoiceItem();

        $invoiceItem->name = 'Course '.$this->selectedCourse->name;
        $invoiceItem->price = $this->selectedCourse->price;
        $invoiceItem->quantity = 1;
        $invoiceItem->invoice_id = $invoice->id;
        $invoiceItem->save();

        $this->selectedCourse->students()->attach($user->id);
        if (!empty($this->payment)){
            Payment::create([
                'amount'=> $this->payment,
                'invoice_id'=> $invoice->id,
            ]);
        }


        flash()->addSuccess('admission completed successfully');

        return redirect()->route('admission');
    }

}
