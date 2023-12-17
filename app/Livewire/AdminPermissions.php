<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use App\Livewire\Forms\PermissinsForm;
use Illuminate\Support\Facades\Log;

class AdminPermissions extends Component
{

    public $isOpen = false;
    public $id;

    public PermissinsForm $form;

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }

    public function create()
    {
        $this->reset('form.name');
        $this->openModal();
    }

    public function edit($id)
    {
        $this->closeModal();
        $permissins = Permission::findOrFail($id);
        $this->id = $id;
        $this->form->name = $permissins->name;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();
        $this->form->save();
        $this->dispatch('banner_alert', style: 'success', title: 'Permissins created successfully' );
        $this->reset('form.name');
        $this->closeModal();
    }

    public function update()
    {
        if ($this->id) {

            $permission = Permission::findOrFail($this->id);
            $this->validate();
            $permission->update([
                'name' => $this->form->name,
            ]);
            $this->id = '';
            $this->dispatch('banner_alert', style: 'success', title: 'Permissins updated successfully' );
            $this->closeModal();
            $this->reset('form.name');

        }
    }


    public function render()
    {
        return view('livewire.admin-permissions', [
            'permissions' => Permission::paginate(20)
        ]);

     
    }
}
