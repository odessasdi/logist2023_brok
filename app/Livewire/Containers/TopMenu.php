<?php
// TODO!
namespace App\Livewire\Containers;

use Livewire\Component;
use App\Livewire\Containers;



class TopMenu extends Component
{
    public $position = '';



    public function resetFiltersPosition()
    {
        $this->position = '0';
        $this->dispatch('setFiltersPosition', position:  '0');
    }



    public function setFiltersPosition($position)
    {
        $this->position = $position;
        $this->dispatch('setFiltersPosition', position: $position);

    }


    public function render()
    {
        $this->resetFiltersPosition();

        $mainTable = new Containers;

        $all= $mainTable->StatSmallAll()->count();

        $out_ports = $mainTable->StatSmallAll()->where('position', 1)->count();
        $ports = $mainTable->StatSmallAll()->where('position', 2)->count();
        $storage = $mainTable->StatSmallAll()->where('position', 3)->count();
        $pl = $mainTable->StatSmallAll()->where('position', 4)->count();
        $ukr = $mainTable->StatSmallAll()->where('position', 5)->count();
        $over = $mainTable->StatSmallAll()->where('position', 6)->count();

        $in_work = $mainTable->StatSmallAll()->where('position', '!=', 6)->count();

        if(isset(request()->filters)){$this->position = request()->filters['position'];};
        
        return view('livewire.containers.top-menu', ['in_work' => $in_work, 'out_ports'=> $out_ports, 'ports'=> $ports, 'all' => $all, 'storage' => $storage, 'pl' => $pl, 'ukr' => $ukr, 'over' => $over, 'position' => $this->position ]);

    }
}




