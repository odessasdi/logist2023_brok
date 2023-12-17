<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use Illuminate\Support\Facades\Log;

class Banner extends Component
{

    #[On('banner_alert')]
    public function test($style, $title) {
        session()->flash('flash.banner', $title );
        session()->flash('flash.bannerStyle', $style );
    }

    public function render()
    {
        return view('livewire.banner');
    }
}
