<?php

namespace App\Livewire\Dsi;

use Livewire\Component;
use Livewire\Attributes\On; 

class MobileHeader extends Component
{

    public $isOpen = false;


    public function openMenu()
    {
        $this->isOpen = true;
    }

    public function closeMenu()
    {
        $this->isOpen = false;
    }
    
    public function render()
    {
        return view('livewire.dsi.mobile-header');
    }
}

