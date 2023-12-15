<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use HasRoles;

 
class Counter extends Component
{
 

    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
 
    public function render()
    {
        return view('livewire.counter'); 
    }
}
