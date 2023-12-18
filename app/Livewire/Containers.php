<?php

namespace App\Livewire;
use App\Models\Client;
use App\Models\Expeditor;
use App\Models\Port;
use App\Models\Container;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\ContainerForm;
use App\Models\Status;
use App\Models\Line;
use App\Helpers\ContainerHelper;
class Containers extends Component
{



    public $search;
    public $sortField = 'status_id';
    public $sortDirection = 'desc';
    public $containers = '';

    public $filters = [
        'position' => '',
        'status' => '',
        'port' => '',
        'client' => '',
        'expeditor' => '',
    ];

    protected $queryString = ['sortField', 'sortDirection', 'search', 'filters'];
    public $isOpen = false;
    public $id;


    public ContainerForm $form;

    #[On('setFiltersPosition')] 
    public function setFiltersPosition($position)
    {
        $this->filters['position'] = $position;
    }


    public function toggleModal()
    {
        $this->isOpen = !$this->isOpen;
        if (!$this->isOpen) {
            $this->form->reset();
            $this->resetValidation();
        }
    }


    public function create()
    {
        $this->form->reset();
        $this->toggleModal();
    }

    public function store()
    {
        // $this->validate();
        $this->form->save();
        $this->toggleModal();
        $this->dispatch('banner_alert', style: 'success', title: 'КОНТЕЙНЕР ДОБАВЛЕН' );
        // dd($this->isOpen);
    }


    public function edit($id)
    {
 
        $container = Container::findOrFail($id);
        $this->form->fill($container->toArray());
        $this->toggleModal();
    }
    


    public function update()
    {
        if ($this->id) {

    
            $this->form->save();

            $this->id = '';
            $this->toggleModal();
            $this->dispatch('banner_alert', style: 'success', title: 'КОНТЕЙНЕР ИЗМЕНЕН' );
            $this->form->reset();

        }
    }



    public function render()
    {
        $this->getContainers();   
        $this->modifyContainers();
        $ports = Port::all();
        $expeditors = Expeditor::all();
        $clients = Client::all();
        $statuses = Status::all();
        $lines = Line::all();
    
        return view('livewire.containers', 
        ['containers' => $this->containers, 'ports' => $ports,  'expeditors' => $expeditors,   'clients' => $clients, 'statuses' => $statuses, 'lines' => $lines]);
    }


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }
    
    public function getContainers()
    {
        $this->containers = Container::with('port', 'line', 'status', 'expeditor', 'client')
            ->search('containerNumber', $this->search)
            ->when($this->filters['status'], function ($query, $status) {
                return $query->where('status_id', $status);
            })
            ->when($this->filters['port'], function ($query, $port) {
                return $query->where('port_id', $port);
            })
            ->when($this->filters['client'], function ($query, $client) {
                return $query->where('client_id', $client);
            })
            ->when($this->filters['expeditor'], function ($query, $expeditor) {
                return $query->where('expeditor_id', $expeditor);
            })
            

            
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();
    }
    


    public function modifyContainers()
    {
        $positions = [
            1 => ['name' => 'НЕТ В ПОРТУ', 'color' => 'gray', 'slug' => 'приход: '],
            2 => ['name' => 'В ПОРТУ', 'color' => 'red', 'slug' => 'план на склад:'],
            3 => ['name' => 'СКЛАД', 'color' => 'yellow', 'slug' => 'план на погрузку:'],
            4 => ['name' => 'НА ГРАНИЦЕ', 'color' => 'purple', 'slug' => 'план пересечение:'],
            5 => ['name' => 'ПРОШЛА ГРАНИЦУ', 'color' => 'blue', 'slug' => 'план оформления:'],
            6 => ['name' => 'ОФОРМЛЕН', 'color' => 'green', 'slug' => ''],
        ];

        
        $inWorkPositions = [
            1 => ['name' => 'оформили за:'],
            2 => ['name' => 'в работе:'],
            3 => ['name' => 'плывет'],
        ];

        
        $this->containers = $this->containers->map(function ($item) use ($positions, $inWorkPositions) {
          

            // $item->isValidContainerNumber = ContainerHelper::isValidContainerNumber($item->containerNumber);
         

            $item->position = '';
            $item->position_date = '';
            $item->position_diff_date = '';
            $item->inWork_diff_date = '';
            $item->inWorkPosition = '';
            $item->oldCs = '';
         

            if ($item->dateOver){
                $item->position = 6;
                $item->position_date = $item->dateOver;
            } elseif ($item->dateUkraine){
                $item->position = 5;
                $item->position_date = $item->dateUkraine;
            } elseif ($item->dateEnd){
                $item->position = 4;
                $item->position_date = $item->dateEnd;
            } elseif ($item->dateStorage){
                $item->position = 3;
                $item->position_date = $item->dateStorage;
            } elseif ($item->datePort){
                $item->position = 2;
                $item->position_date = $item->datePort;
            }  else {
                $item->position = 1;
                $item->position_date = $item->dateStart;
            }

    
            $item->position_diff_date =  Carbon::parse($item->position_date)->diffInDays(Carbon::now(), false);
                    //todo
            if ($item->position_diff_date < 0 and $item->position > 1 ){     
                $item->position = $item->position - 1 ; 
            } else { 

           
            }
    

            if(isset($positions[$item->position])) {
                $item->positionName = $positions[$item->position]['name'];
                $item->positionColor = $positions[$item->position]['color'];
                $item->positionSlug = $positions[$item->position]['slug'];
            }

            //  дней в работе с даты прихода или с даты когда дали в работу
            // inWorkPosition  1-оформили,  2-в работе, 3-плывет 
        
            if ($item->datePort >=  $item->dateStart) {
                $minDate = Carbon::parse($item->datePort);
            } elseif ($item->datePort <  $item->dateStart) {
                $minDate = Carbon::parse($item->dateStart);
                $item->oldCs = '1';
            }

            
            if($item->dateOver){         
                $maxDate = Carbon::parse($item->dateOver);
                $item->inWorkPosition  = '1'; 
            } elseif (empty($item->datePort)) { 
                $minDate = Carbon::now();
                $maxDate = Carbon::now();
                $item->inWorkPosition  = '3';
            } else {
                $maxDate = Carbon::now();
                $item->inWorkPosition  = '2'; 
            }
           
            $item->inWork_diff_date = $minDate->diffInDays($maxDate);

            if(isset($inWorkPositions[$item->inWorkPosition])) {
                $item->inWorkPositionName = $inWorkPositions[$item->inWorkPosition]['name'];
       
            }
            return $item;
        });

        if (isset($this->filters['position'])) {
            if ($this->filters['position'] == '0') {
                $this->containers = $this->containers->whereIn('position', [1, 2, 3, 4, 5])->sortByDesc('position');
            } elseif ($this->filters['position']) {
                $this->containers = $this->containers->where('position', $this->filters['position'])->sortByDesc('position_date');
            }
        } else {
            $this->containers = $this->containers->sortByDesc('created_at');
        }
        

    
    }


    public function StatSmallAll()
    {
        $this->getContainers();
        $this->modifyContainers();
        $StatSmallAll = $this->containers;
        return ($StatSmallAll);
    }
}


