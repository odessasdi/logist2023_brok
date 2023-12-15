<?php

namespace App\Livewire;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use Livewire\Component;

class AdminUser extends Component
{
    public $users, $id, $isOpen = false, $user, $roles, $selectedRoles;

    public function edit($id)
    {
        $this->roles = Role::all();
        $this->user = User::findOrFail($id);
        $this->id = $id;
        $this->selectedRoles = $this->user->roles->pluck('name')->toArray();
        $this->isOpen = true;
    }

    public function update()
    {
        $this->user->syncRoles([$this->selectedRoles]);
        session()->flash('message', 'Role Updated Successfully.');
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->user = '';
        $this->id = '';
        $this->selectedRoles = [];
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        $this->users = User::with('roles')->get();
        return view('livewire.admin-user');
    }
}
