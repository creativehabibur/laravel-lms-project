<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::where('name','!=','Super Admin')->with('permissions')->get();
        return view('livewire.role-index',['roles' => $roles]);
    }

    public function roleDelete($id){
        $role = Role::findOrFail($id);

        $role->delete();

        flash()->addSuccess('Role deleted successfully!');

        return redirect()->route('role.index');
    }
}
