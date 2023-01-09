<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $selectedRole;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'selectedRole' => 'required',
    ];
    public function render()
    {
        $roles = Role::all();
        return view('livewire.user-create', [
            'roles' => $roles
        ]);
    }

    public function userCreate() {
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        $user->assignRole($this->selectedRole);

        flash()->addSuccess('User created successfully');

        return redirect()->route('user.index');
    }
}
