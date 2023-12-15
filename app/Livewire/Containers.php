<?php

namespace App\Livewire;
use App\Models\Client;
use App\Models\Expeditor;
use App\Models\Port;
use App\Models\Container;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;




use Livewire\Component;

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
   
    public function render()
    {

 


        $this->getContainers();   
        $this->modifyContainers();
        $ports = port::all();
        $expeditors = expeditor::all();
        $clients = Client::all();
    
        return view('livewire.containers', ['containers' => $this->containers, 'ports' => $ports,  'expeditors' => $expeditors,   'clients' => $clients,]);
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
       

        $this->containers =  Container::with('port', 'line', 
        'status', 
        'expeditor', 'client')
            ->search('containerNumber', $this->search)
            ->when(Auth::user()->hasRole('westana'), function ($query) {
                $query->where('expeditor_id', '1');
            })
            ->when(Auth::user()->hasRole('client'), function ($query) {
                $query->where('client_id', '4');
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
        

        if (isset($this->filters['status'])) {
            $this->filters['status'] ? $this->containers = $this->containers->where('status_id', $this->filters['status']) : '';
        };

        if (isset($this->filters['port'])) {
            $this->filters['port'] ? $this->containers = $this->containers->where('port_id', $this->filters['port']) : '';
        };

        if (isset($this->filters['client'])) {
            $this->filters['client'] ? $this->containers = $this->containers->where('client_id', $this->filters['client']) : '';
        };

        if (isset($this->filters['expeditor'])) {
            $this->filters['expeditor'] ? $this->containers = $this->containers->where('expeditor_id', $this->filters['expeditor']) : '';
        };

    }


    public function StatSmallAll()
    {
        $this->getContainers();
        $this->modifyContainers();
        $StatSmallAll = $this->containers;
        return ($StatSmallAll);
    }
}


