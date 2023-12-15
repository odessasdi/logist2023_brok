<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Spatie\Permission\Models\Permission;



class PermissinsForm extends Form
{
    #[Rule('required|min:3')]
    public $name;

    public function save()
    {

        Permission::create(['name' => $this->name]);
    
    }
}


