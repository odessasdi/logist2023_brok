<?php
// TODO!
namespace App\Livewire\Containers;

use Livewire\Component;
use App\Livewire\Containers;


class TopMenu extends Component
{
    public $position = '';
    public $all = '';
    public $out_ports  = '';
    public $ports  = '';
    public $storage  = '';
    public $pl = '';
    public $ukr = '';
    public $over = '';
    public $in_work = '';


    public function resetFiltersPosition()
    {
        $this->position = '';
        $this->dispatch('setFiltersPosition', position:  '');
    }

    public function setFiltersPosition($position)
    {


        $this->position = $position;
   
        $this->dispatch('setFiltersPosition', position: $position);


        
    }

       public function placeholder()
    {
        return view('livewire.containers.top-menu-loading');
     
    }

    public function mount()
    {

     
        if(isset(request()->filters)){$this->position = request()->filters['position'];};

        $mainTable = new Containers;

        $this->all= $mainTable->StatSmallAll()->count();

        $this->out_ports = $mainTable->StatSmallAll()->where('position', 1)->count();
        $this->ports = $mainTable->StatSmallAll()->where('position', 2)->count();
        $this->storage = $mainTable->StatSmallAll()->where('position', 3)->count();
        $this->pl = $mainTable->StatSmallAll()->where('position', 4)->count();
        $this->ukr = $mainTable->StatSmallAll()->where('position', 5)->count();
        $this->over = $mainTable->StatSmallAll()->where('position', 6)->count();

        $this->in_work = $mainTable->StatSmallAll()->where('position', '!=', 6)->count();
    }

    public function render()
    {

     

    
        
        return view('livewire.containers.top-menu', 
        // ['in_work' => $in_work, 'out_ports'=> $out_ports, 'ports'=> $ports, 'all' => $all, 'storage' => $storage, 'pl' => $pl, 'ukr' => $ukr, 'over' => $over, 'position' => $this->position ]
    );

    }
}




