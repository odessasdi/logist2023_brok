<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class AdminRoles extends Component
{
    public $roles, $roleName, $role_id, $permissions = [], $selectedPermissions = [], $isOpen = false;

    
    public function render()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        return view('livewire.admin-roles');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->roleName = '';
        $this->role_id = '';
        $this->selectedPermissions = [];
    }

    public function store()
    {
        $validatedData = $this->validate([
            'roleName' => 'required',
            'selectedPermissions' => 'required',
        ]);

        $role = Role::create(['name' => $this->roleName]);

 
        $role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();

    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->role_id = $id;
        $this->roleName = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'roleName' => 'required',
            'selectedPermissions' => 'required',
        ]);

        $role = Role::find($this->role_id);
        $role->update([
            'name' => $this->roleName,
        ]);


    //    / dd($this->selectedPermissions);
        $role->syncPermissions($this->selectedPermissions);
        session()->flash('message', 'Role Updated Successfully.');
        $this->closeModal();
        $this->resetInputFields();

    }


}
