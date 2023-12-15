<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule; 
use Livewire\Form;
use App\Models\Dsiform;


class ContactsForm extends Form
{
    #[Rule('required|min:3|max:25')]
    public $firstName;
    #[Rule('required|min:3|max:25')]
    public $lastName;
    #[Rule('required|email|max:50')]
    public $email;
    #[Rule('required|numeric')]
    public $phoneNumber;
    #[Rule('required|min:3|max:255')]
    public $message;

    public function save()
    {
        $this->validate();
 
        Dsiform::create(
            array_merge(
                $this->only(['firstName', 'lastName', 'email', 'phoneNumber', 'message']),
                ['ip' => request()->ip()]
            )
        );

        $this->reset(); 

    }

}
