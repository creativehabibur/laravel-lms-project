<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\Note;
use Livewire\Component;
use Mockery\Matcher\Not;

class EditLead extends Component
{
    public $lead_id;
    public $name;
    public $email;
    public $phone;
    public $note;

    public function mount(){
      $lead = Lead::findOrFail($this->lead_id);
      $this->name = $lead->name;
      $this->email = $lead->email;
      $this->phone = $lead->phone;
    }
    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);
        $notes = $lead->notes;
        return view('livewire.edit-lead',['notes'=>$notes]);
    }

    protected $rules = [
        'email' =>'email',
        'phone' =>'required'
    ];
    public function updateLead($id)
    {
        sleep(5);
        $lead = Lead::findOrFail($id);
        $this->validate();
        $lead->name = $this->name;
        $lead->email = $this->email;
        $lead->phone = $this->phone;
        $lead->save();

        flash()->addSuccess('Updated successfully!');
    }

    public function addNote()
    {
        $note = new Note();

        $note->description = $this->note;
        $note->lead_id = $this->lead_id;
        $note->save();

        $this->note = '';

        flash()->addSuccess('Note added successfully!');

    }


}
