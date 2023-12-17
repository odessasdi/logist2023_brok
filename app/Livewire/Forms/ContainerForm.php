<?php

namespace App\Livewire\Forms;

use App\Models\Container;
use Livewire\Attributes\Validate;
use Livewire\Form;


class ContainerForm extends Form
{

    public $id;
    public $containerNumber;
    public $containerGoods;
    public $containerWeight;
    public $line_id;
    public $port_id;
    public $status_id;
    public $client_id;
    public $expeditor_id;
    public $destination;
    public $dateStart;
    public $datePort;
    public $dateStorage;
    public $dateUkraine;
    public $dateOver;
    public $dateEnd;
    public $note1;
    public $note2;


    public function rules()
    {
        $containerNumberRule = 'required|string|max:11|unique:containers,containerNumber';
    
        if ($this->id) {
            // If updating, ignore the current container ID in the unique check
            $containerNumberRule .= ',' . $this->id;
        }
    
        return [
            'containerNumber' => $containerNumberRule,
            'containerGoods' => 'required|string|max:30',
            'containerWeight' => 'required|string|max:5',
            'line_id' => 'required|string|max:10',
            'port_id' => 'required|string|max:10',
            'status_id' => 'required|string|max:1',
            'client_id' => 'nullable|string|max:10',
            'expeditor_id' => 'nullable|string|max:10',
            'destination' => 'nullable|string|max:20',
            'dateStart' => 'required|date',
            'datePort' => 'nullable|date',
            'dateStorage' => 'nullable|date',
            'dateUkraine' => 'nullable|date',
            'dateOver' => 'nullable|date',
            'dateEnd' => 'nullable|date',
            'note1' => 'nullable|string',
            'note2' => 'nullable|string',
        
        ];
    }

    public function messages()
    {
        return [
            'containerNumber.required' => 'Номер контейнера обязателен.',
            'containerNumber.string' => 'Номер контейнера должен быть строкой.',
            'containerNumber.max' => 'Номер контейнера не должен превышать 11 символов.',
            'containerNumber.unique' => 'Номер контейнера уже есть в базе.',
            
            'containerGoods.required' => 'Товар в контейнере обязателен.',
            'containerGoods.string' => 'Товар в контейнере должен быть строкой.',
            'containerGoods.max' => 'Товар в контейнере не должен превышать 30 символов.',
    
            'containerWeight.required' => 'Вес контейнера обязателен.',
            'containerWeight.string' => 'Вес контейнера должен быть строкой.',
            'containerWeight.max' => 'Вес контейнера не должен превышать 5 символов.',
    
            'line_id.required' => 'Идентификатор линии обязателен.',
            'line_id.string' => 'Идентификатор линии должен быть строкой.',
            'line_id.max' => 'Идентификатор линии не должен превышать 10 символов.',
    
            'port_id.required' => 'Идентификатор порта обязателен.',
            'port_id.string' => 'Идентификатор порта должен быть строкой.',
            'port_id.max' => 'Идентификатор порта не должен превышать 10 символов.',
    
            'status_id.required' => 'Идентификатор статуса обязателен.',
            'status_id.string' => 'Идентификатор статуса должен быть строкой.',
            'status_id.max' => 'Идентификатор статуса не должен превышать 1 символ.',
    
            'client_id.string' => 'Идентификатор клиента должен быть строкой.',
            'client_id.max' => 'Идентификатор клиента не должен превышать 10 символов.',
    
            'expeditor_id.string' => 'Идентификатор экспедитора должен быть строкой.',
            'expeditor_id.max' => 'Идентификатор экспедитора не должен превышать 10 символов.',
    
            'destination.string' => 'Пункт назначения должен быть строкой.',
            'destination.max' => 'Пункт назначения не должен превышать 20 символов.',
    
            'dateStart.required' => 'Дата начала обязательна.',
            'dateStart.date' => 'Дата начала должна быть действительной датой.',
    
            'datePort.date' => 'Дата прибытия в порт должна быть действительной датой.',
    
            'dateStorage.date' => 'Дата хранения должна быть действительной датой.',
    
            'dateUkraine.date' => 'Дата прибытия в Украину должна быть действительной датой.',
    
            'dateOver.date' => 'Дата перегрузки должна быть действительной датой.',
    
            'dateEnd.date' => 'Дата окончания должна быть действительной датой.',
    
            'note1.string' => 'Примечание 1 должно быть строкой.',
    
            'note2.string' => 'Примечание 2 должно быть строкой.',
        ];
    }
    

    public function save()
{



    $this->validate();

    $data = [
        'containerNumber' => $this->containerNumber,
        'containerGoods' => $this->containerGoods,
        'containerWeight' => $this->containerWeight,
        'line_id' => $this->line_id,
        'port_id' => $this->port_id,
        'status_id' => $this->status_id,
        'client_id' => $this->client_id,
        'expeditor_id' => $this->expeditor_id,
        'destination' => $this->destination,
        'dateStart' => $this->dateStart,
        'datePort' => $this->datePort,
        'dateStorage' => $this->dateStorage,
        'dateUkraine' => $this->dateUkraine,
        'dateOver' => $this->dateOver,
        'dateEnd' => $this->dateEnd,
        'note1' => $this->note1,
        'note2' => $this->note2,
    ];

    if ($this->id) {
        // Update the existing container
        $container = Container::find($this->id);
        if ($container) {
            $container->update($data);
        }
    } else {
        // Create a new container
        Container::create($data);
    }

    $this->reset();
}

}
