<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public $selectPermissions = [];
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.role-create',['permissions' => $permissions]);
    }

    protected $rules = [
        'name' => 'required|unique:roles',
        'selectPermissions' => 'required',
    ];

    public function createRole(){
        $role = new Role();

        $this->validate();
        $role->name = $this->name;
        $role->save();

        $role->givePermissionTo($this->selectPermissions);
        flash()->addSuccess('Role created successfully!');

        return redirect()->route('role.index');
    }
}
