<?php
// TODO!
namespace App\Livewire\Containers;

use Livewire\Component;
use App\Livewire\Containers;



class TopMenu extends Component
{
    public $position = '';
    public function render()
    {

        $mainTable = new Containers;

        $all= $mainTable->StatSmall()->count();

        $out_ports = $mainTable->StatSmall()->where('position', 1)->count();
        $ports = $mainTable->StatSmall()->where('position', 2)->count();
        $storage = $mainTable->StatSmall()->where('position', 3)->count();
        $pl = $mainTable->StatSmall()->where('position', 4)->count();
        $ukr = $mainTable->StatSmall()->where('position', 5)->count();
        $over = $mainTable->StatSmall()->where('position', 6)->count();

        $in_work = $mainTable->StatSmall()->where('position', '!=', 6)->count();

        if(isset(request()->filters)){$this->position = request()->filters['position'];};
        
        return view('livewire.containers.top-menu', ['in_work' => $in_work, 'out_ports'=> $out_ports, 'ports'=> $ports, 'all' => $all, 'storage' => $storage, 'pl' => $pl, 'ukr' => $ukr, 'over' => $over, 'position' => $this->position ]);

    }
}




