<x-slot name="header">
    <livewire:containers.top-menu lazy>
</x-slot>

<div class="py-4">
    <div class="py-2">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <div class="grid md:grid-flow-col grid-flow-row">
                        <div class=" pt-2 px-1 sm:mt-0">
                            <div
                                class="pointer-events-auto relative inline-flex rounded-md bg-white text-[0.8125rem] font-medium leading-5 text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 hover:text-slate-900">
                                <div class="flex py-2 px-3"><svg class="mr-2.5 h-5 w-5 flex-none fill-slate-400">
                                        <path d="M5 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v14l-5-2.5L5 18V4Z"></path>
                                    </svg>
                                    ВЫБРАНО:
                                </div>
                                <div class="border-l border-slate-400/20 py-2 px-2.5"> {{ $containers->count() }}
                                </div>
                            </div>
                        </div>
                        <div class=" pt-1 px-1">

                            <label for="search" class="sr-only"></label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                    aria-hidden="true">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model.live="search" type="text" name="search" id="search"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="КОНТЕЙНЕР">
                            </div>
                        </div>

                        <div class="px-1">
                            <x-old.input.group inline for="filter-status" label="">
                                <x-old.input.select wire:model.lazy="filters.status" id="filter-status"
                                    class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">ВСЕ СТАТУСЫ</option>
                                    <option value="1">обычный</option>
                                    <option value="2">важный</option>
                                    <option value="3">STOP!!!</option>
                                </x-old.input.select>
                            </x-old.input.group>
                        </div>

                        <div class="px-1">
                            <x-old.input.group inline for="filter-port" label="">
                                <x-old.input.select wire:model.lazy="filters.port" id="filter-port"
                                    class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">

                                    <option value="">ВСЕ ПОРТЫ</option>

                                    @forelse($ports as $port)
                                        <option value="{{ $port->id }}"> {{ $port->port }}</option>

                                    @empty
                                        <option value=""></option>
                                    @endforelse

                                    </x-input.select>
                            </x-old.input.group>
                        </div>

                        @can('expeditors_show')
                            <div class="px-1">
                                <x-old.input.group inline for="filter-expeditor" label="">
                                    <x-old.input.select wire:model.lazy="filters.expeditor" id="filter-expeditor"
                                        class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">

                                        <option value="">ВСЕ ЭКСПЕДИТОРЫ</option>

                                        @forelse($expeditors as $expeditor)
                                            <option value="{{ $expeditor->id }}"> {{ $expeditor->expeditorName }}</option>

                                        @empty
                                            <option value=""></option>
                                        @endforelse

                                    </x-old.input.select>
                                </x-old.input.group>
                            </div>
                        @endcan

                        @can('clients_show')
                            <div class="px-1">
                                <x-old.input.group inline for="filter-client" label="">
                                    <x-old.input.select wire:model.lazy="filters.client" id="filter-client"
                                        class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">

                                        <option value="">ВСЕ КЛИЕНТЫ</option>

                                        @forelse($clients as $client)
                                            <option value="{{ $client->id }}"> {{ $client->clientName }}</option>

                                        @empty
                                            <option value=""></option>
                                        @endforelse

                                    </x-old.input.select>
                                </x-old.input.group>
                            </div>
                        @endcan
                    </div>
                </div>

                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


                    <button wire:click.prevent="create"
                        class=" bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 rounded-md "">ДОБАВИТЬ</button>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="shadow-sm ring-1 ring-black ring-opacity-5">

                            <x-old.table.table>
                                <x-slot name="head">
                                    <x-old.table.header sortable wire:click="sortBy('containerNumber')"
                                        :direction="$sortField === 'containerNumber' ? $sortDirection : null">
                                        <div class="max-w-[100px]">КОНЕЙНЕР <p class="text-gray-500">POJEMNIK</p>
                                        </div>
                                    </x-old.table.header>


                                    @can('containers_edit')
                                        <x-old.table.header>
                                        </x-old.table.header>
                                    @endcan

                                    <x-old.table.header sortable wire:click="sortBy('containerGoods')"
                                        :direction="$sortField === 'containerGoods' ? $sortDirection : null">
                                        <div class="max-w-[200px]">ТОВАР <p class="text-gray-500">PRODUKT</p>
                                        </div>
                                    </x-old.table.header>

                                    <x-old.table.header sortable wire:click="sortBy('port_id')" :direction="$sortField === 'port_id' ? $sortDirection : null">
                                        <div class="max-w-[150px]">ПОРТ <p class="text-gray-500">PORT</p>
                                        </div>
                                    </x-old.table.header>
                                    <x-old.table.header sortable wire:click="sortBy('status_id')" :direction="$sortField === 'status_id' ? $sortDirection : null">
                                        <div class="max-w-[70px]">ПРИОРИТЕТ <p class="text-gray-500">PRIORYTET</p>
                                        </div>
                                    </x-old.table.header>

                                    @can('clients_show')
                                        <x-old.table.header sortable wire:click="sortBy('client_id')" :direction="$sortField === 'client_id' ? $sortDirection : null">
                                            <div class="max-w-[70px]">КЛИЕНТ </div>
                                        </x-old.table.header>
                                    @endcan

                                    <x-old.table.header>
                                        <p class="text-gray-500"></p>
                                    </x-old.table.header>

                                    <x-old.table.header>
                                        <p class="text-gray-500"></p>
                                    </x-old.table.header>

                                    <x-old.table.header sortable>ЗАМЕТКА УКРАИНА <p class="text-gray-500">
                                            NOTATKA&nbsp;UKRAINA</p>
                                    </x-old.table.header>
                                    <x-old.table.header sortable>ЗАМЕТКА СКЛАДА <p class="text-gray-500">
                                            NOTATKA&nbsp;MAGAZYNOWA</p>
                                    </x-old.table.header>
                                </x-slot>

                                <x-slot name="body">
                                    @forelse($containers as $container)
                                        <x-old.table.row class="bg-cool-gray-200">

                                            <x-old.table.cell>
                                                {{ $container->containerNumber }}
                                                {{-- @if ($container->isValidContainerNumber)
                                                
                                                @else
                                                <p>a</p>
                                                    @endif --}}
                                                
                                            </x-old.table.cell>

                                            @can('containers_edit')
                                                <x-old.table.cell>
                                                    <a href="#" wire:click.prevent="edit({{ $container->id }})"
                                                        class=" inline-flex items-center px-2 py-2  text-indigo-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </x-old.table.cell>
                                            @endcan


                                            <x-old.table.cell>
                                                {{ $container->containerGoods }}
                                                <x-old.test>{{ $container->containerWeight }}
                                                    &nbsp;{{ $container->destination }}</x-old.test>
                                            </x-old.table.cell>

                                            <x-old.table.cell>
                                                {{ $container->port->port }}
                                                <x-old.test>{{ $container->line->lineName }}</x-old.test>
                                            </x-old.table.cell>


                                            <x-old.table.cell>
                                                <span
                                                    class="inline-flex rounded-full  px-2 text-xs font-semibold leading-5 text-{{ $container->status->color }}-800">
                                                    {{ $container->status->status }}
                                                </span>

                                                @can('expeditors_show')
                                                    <x-old.test> {{ $container->expeditor->expeditorName }}</x-old.test>
                                                @endcan

                                            </x-old.table.cell>


                                            @can('clients_show')
                                                <x-old.table.cell class="text-center">
                                                    <div>
                                                        <p
                                                            class="max-w-[300px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">
                                                            {{ $container->client ? $container->client->clientName : '' }}
                                                        </p>
                                                    </div>
                                                </x-old.table.cell>
                                            @endcan

                                            <x-old.table.cell class="text-center">
                                                <x-old.table.steps_name :container='$container'> </x-old.table.steps_name>
                                                <x-old.table.steps>{{ $container->position }}</x-old.table.steps>
                                            </x-old.table.cell>

                                            <x-old.table.cell class="text-center">

                                                {{ $container->inWork_diff_date > 0 ? $container->inWorkPositionName . $container->inWork_diff_date . 'дн.' : '' }}
                                                @if ($container->oldCs)
                                                    <x-old.test>СТАРЫЙ КС </x-old.test>
                                                @endif

                                            </x-old.table.cell>

                                            <x-old.table.cell>
                                                <div>
                                                    <p
                                                        class="max-w-[300px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">
                                                        {{ $container->note1 }}</p>
                                                </div>
                                            </x-old.table.cell>

                                            <x-old.table.cell
                                                class="max-w-[200px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">
                                                {{ $container->note2 }}
                                            </x-old.table.cell>

                                        </x-old.table.row>
                                    @empty
                                        <x-old.table.row class="bg-cool-gray-200">
                                            <x-old.table.cell colspan="12">НЕТ ТАКИХ ЗАПИСЕЙ / NIE MA TAKICH
                                                REJESTRÓW</x-old.table.cell>
                                        </x-old.table.row>
                                    @endforelse

                                </x-slot>
                            </x-old.table.table>
                        </div>
                    </div>
                </div>
                <div class="py-2">

                </div>


                {{-- modal --}}
                @if ($isOpen)

                    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="mt-6 sm:mt-0">
                                <div class="py-12">
                                    <div class="px-4 sm:px-6 lg:px-8">
                                        <div class="mt-5 md:mt-0 md:col-span-2">

                                            <form wire:submit.prevent="{{ $id ? 'update' : 'store' }}">
                                                <div class="shadow overflow-hidden sm:rounded-md">
                                                    <div class="px-4 py-5 bg-white sm:p-6">

                                                        <h2 class="text-lg font-medium text-gray-900 pb-6">
                                                            {{ $id ? 'ИЗМЕНИТЬ ЗАПИСЬ' : 'ДОБАВИТЬ ЗАПИСЬ' }}</h2>

                                                        <div class="grid grid-cols-6 gap-6 gap-y-4">
                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="containerNumber"
                                                                    class="block text-sm font-medium text-gray-700">КОНТЕЙНЕР</label>
                                                               
                                                                    <div class="relative mt-2 rounded-md shadow-sm">
                                                                    <input wire:model="form.containerNumber"
                                                                    type="text" name="containerNumber"
                                                                    id="containerNumber"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    
                                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                                          {{-- <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                                          </svg> --}}
                                                                        </div>
                                                                    </div>

                                        

                                                                   
                                                             
                                                               
                                                                 
                                                                    
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-containerNumber">
                                                                    @error('form.containerNumber')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>




                         






                                                            <div class="col-span-6 sm:col-span-2">
                                                                <label for="lcontainerGoods"
                                                                    class="block text-sm font-medium text-gray-700">ТОВАР</label>
                                                                <input wire:model="form.containerGoods" type="text"
                                                                    name="containerGoods" id="containerGoods"
                                                                    autocomplete="family-name"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-containerGoods">
                                                                    @error('form.containerGoods')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="containerWeight"
                                                                    class="block text-sm font-medium text-gray-700">ВЕС
                                                                    / WAGA</label>
                                                                <input wire:model="form.containerWeight"
                                                                    type="text" name="containerWeight"
                                                                    id="containerWeight"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-containerWeight">
                                                                    @error('form.containerWeight')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>



                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="status_id"
                                                                    class="block text-sm font-medium text-gray-700">ПРИОРИТЕТ</label>
                                                                <select wire:model="form.status_id" id="status_id"
                                                                    name="status_id"
                                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                    <option></option>
                                                                    @foreach ($statuses as $status)
                                                                        <option value="{{ $status->id }}">
                                                                            {{ $status->status }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-status_id">
                                                                    @error('form.status_id')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="line_id"
                                                                    class="block text-sm font-medium text-gray-700">ЛИНИЯ</label>
                                                                <select wire:model="form.line_id" id="line_id"
                                                                    name="line_id"
                                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                    <option></option>
                                                                    @foreach ($lines as $line)
                                                                        <option value="{{ $line->id }}">
                                                                            {{ $line->lineName }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-line_id">
                                                                    @error('form.line_id')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>


                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="port_id"
                                                                    class="block text-sm font-medium text-gray-700">ПОРТ</label>
                                                                <select wire:model="form.port_id" id="port_id"
                                                                    name="port_id"
                                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                    <option></option>
                                                                    @foreach ($ports as $port)
                                                                        <option value="{{ $port->id }}">
                                                                            {{ $port->port }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-port_id">
                                                                    @error('form.port_id')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>




                                                            <div class="col-span-6 sm:col-span-2">
                                                                <label for="destination"
                                                                    class="block text-sm font-medium text-gray-700">ПУНКТ
                                                                    НАЗНАЧЕНИЯ / PRZEZNACZENIE</label>
                                                                <input wire:model="form.destination" type="text"
                                                                    name="destination" id="destination"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                                    value="{{ $container->destination }}">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-destination">
                                                                    @error('form.destination')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>



                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="expeditor_id"
                                                                    class="block text-sm font-medium text-gray-700">ЭКСПЕДИТОР
                                                                    (СКЛАД + ПОРТ)</label>
                                                                <select wire:model="form.expeditor_id"
                                                                    id="expeditor_id" name="expeditor_id"
                                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                    <option></option>
                                                                    @foreach ($expeditors as $expeditor)
                                                                        <option value="{{ $expeditor->id }}">
                                                                            {{ $expeditor->expeditorName }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-expeditor_id">
                                                                    @error('form.expeditor_id')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            @can('clients_show')
                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="client_id"
                                                                    class="block text-sm font-medium text-gray-700">КЛИЕНТ</label>
                                                                <select wire:model="form.client_id" id="client_id"
                                                                    name="client_id"
                                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                    <option></option>
                                                                    @foreach ($clients as $client)
                                                                        <option value="{{ $client->id }}">
                                                                            {{ $client->clientName }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-client_id">
                                                                    @error('form.client_id')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                            @endcan
                                                            
                                                        </div>
                                                        <div class="grid grid-cols-6 gap-6 pt-4">

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="dateStart"
                                                                    class="block text-sm font-medium text-gray-700">В
                                                                    РАБОТЕ С </label>
                                                                <input type="date" wire:model="form.dateStart"
                                                                    id="dateStart"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-dateStart">
                                                                    @error('form.dateStart')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="datePort"
                                                                    class="block text-sm font-medium text-gray-700">В
                                                                    ПОРТУ C </label>
                                                                <input type="date" wire:model="form.datePort"
                                                                    id="datePort"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-datePort">
                                                                    @error('form.datePort')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="dateStorage"
                                                                    class="block text-sm font-medium text-gray-700">НА
                                                                    СКЛАДЕ C </label>
                                                                <input type="date" wire:model="form.dateStorage"
                                                                    id="dateStorage"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-dateStorage">
                                                                    @error('form.dateStorage')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="dateEnd"
                                                                    class="block text-sm font-medium text-gray-700">ВЫДАН
                                                                    СО СКЛАДА</label>
                                                                <input type="date" wire:model="form.dateEnd"
                                                                    id="dateEnd"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-xs text-gray-500">АВТО В ПОЛЬШЕ / В
                                                                    РУМЫНИИ</p>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-dateEnd">
                                                                    @error('form.dateEnd')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="dateUkraine"
                                                                    class="block text-sm font-medium text-gray-700">ПЕРЕСЕЧЕНИЕ
                                                                    ГРАНИЦЫ</label>
                                                                <input type="date" wire:model="form.dateUkraine"
                                                                    id="dateUkraine"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-xs text-gray-500">АВТО В УКР</p>
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-dateUkraine">
                                                                    @error('form.dateUkraine')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-1">
                                                                <label for="dateOver"
                                                                    class="block text-sm font-medium text-gray-700">ОФОРМЛЕН</label>
                                                                <input type="date" wire:model="form.dateOver"
                                                                    id="dateOver"
                                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                <p class="mt-2 text-sm text-red-500"
                                                                    id="title-dateOver">
                                                                    @error('form.dateOver')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </p>
                                                            </div>

                                                            <div class="sm:col-span-6">
                                                                <label for="note1"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                    ЗАМЕТКА УКРАИНА </label>
                                                                <div class="mt-1">
                                                                    <textarea wire:model="form.note1" id="note1" name="note1" rows="3"
                                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                                                    <p class="mt-2 text-sm text-red-500"
                                                                        id="title-note1">
                                                                        @error('form.note1')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </p>
                                                                </div>


                                                            </div>

                                                            <div class="sm:col-span-6">
                                                                <label for="note2"
                                                                    class="block text-sm font-medium text-gray-700">
                                                                    ЗАМЕТКА СКЛАДА  </label>
                                                                <div class="mt-1">
                                                                    <textarea wire:model="form.note2" id="note2" name="note2" rows="3"
                                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $container->note2 }}</textarea>
                                                                    <p class="mt-2 text-sm text-red-500"
                                                                        id="title-note2">
                                                                        @error('form.note2')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                        {{-- <a href="{{route('container.index')}}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a> --}}
                                                        <button wire:click="closeModal" type="button"
                                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">ОТМЕНА</button>
                                                 
                                                        <button type="submit"
                                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">СОХРАНИТЬ</button>
                                                            
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>
