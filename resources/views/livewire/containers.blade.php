<x-slot name="header">
    {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Containers') }}
    </h2> --}}
    <livewire:containers.top-menu>
</x-slot>

<div class="py-12">
  

  

    <div class="py-8">
        <div class="px-4 sm:px-6 lg:px-8">
          <div class="sm:flex sm:items-center">
      
            <div class="sm:flex-auto">
              <div class="grid md:grid-flow-col grid-flow-row">
      
                <div class=" pt-2 px-1 sm:mt-0">
      
                  <div class="pointer-events-auto relative inline-flex rounded-md bg-white text-[0.8125rem] font-medium leading-5 text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 hover:text-slate-900">
                    <div class="flex py-2 px-3"><svg class="mr-2.5 h-5 w-5 flex-none fill-slate-400">
                        <path d="M5 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v14l-5-2.5L5 18V4Z"></path>
                      </svg>
                      ВЫБРАНО: 
                    </div>
                    <div class="border-l border-slate-400/20 py-2 px-2.5">    {{ $containers->count()}}
                    </div>
                  </div>
                </div>
                <div class=" pt-1 px-1">
      
                  <label for="search" class="sr-only"></label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" aria-hidden="true">
                      <!-- Heroicon name: solid/search -->
                      <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input wire:model.live="search" type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md" placeholder="КОНТЕЙНЕР">
                  </div>
                </div>
      
                <div class="px-1">
                  <x-old.input.group inline for="filter-status" label="">
                    <x-old.input.select wire:model.lazy="filters.status" id="filter-status" class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                      <option value="">ВСЕ СТАТУСЫ</option>
                      <option value="1">обычный</option>
                      <option value="2">важный</option>
                      <option value="3">STOP!!!</option>
                    </x-old.input.select>
                  </x-old.input.group>
                </div>

                
      
                <div class="px-1">
                  <x-old.input.group inline for="filter-port" label="">
                    <x-old.input.select wire:model.lazy="filters.port" id="filter-port" class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      
                      <option value="">ВСЕ ПОРТЫ</option>
      
                      @forelse($ports as $port)
                      <option value="{{$port->id}}"> {{$port->port}}</option>
      
                      @empty
                      <option value=""></option>
                      @endforelse
      
                    </x-input.select>
                  </x-old.input.group>
                </div>
      
                {{-- @if (Auth::user()->hasRole('admin')) --}}
                <div class="px-1">
                  <x-old.input.group inline for="filter-expeditor" label="">
                    <x-old.input.select wire:model.lazy="filters.expeditor" id="filter-expeditor" class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      
                      <option value="">ВСЕ ЭКСПЕДИТОРЫ</option>
      
                      @forelse($expeditors as $expeditor)
                      <option value="{{$expeditor->id}}"> {{$expeditor->expeditorName}}</option>
      
                      @empty
                      <option value=""></option>
                      @endforelse
      
                    </x-old.input.select>
                  </x-old.input.group>
                </div>
      
                <div class="px-1">
                  <x-old.input.group inline for="filter-client" label="">
                    <x-old.input.select wire:model.lazy="filters.client" id="filter-client" class="mt-1 block w-full pl-3 pr-10 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      
                      <option value="">ВСЕ КЛИЕНТЫ</option>
      
                      @forelse($clients as $client)
                      <option value="{{$client->id}}"> {{$client->clientName}}</option>
      
                      @empty
                      <option value=""></option>
                      @endforelse
      
                    </x-old.input.select>
                  </x-old.input.group>
                </div>
              
                {{-- @endif --}}
      
      
      
      
      
      
              </div>
            </div>
      
      
      
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
      
              {{-- <a href="{{ route('container.create') }}" class=" bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 rounded-md ">ДОБАВИТЬ</a> --}}
            </div>
          </div>
          <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle">
                <div class="shadow-sm ring-1 ring-black ring-opacity-5">
      
                  <x-old.table.table>
                    <x-slot name="head">
                      <x-old.table.header sortable wire:click="sortBy('containerNumber')" :direction="$sortField === 'containerNumber' ? $sortDirection : null">
                        <div class="max-w-[100px]">КОНЕЙНЕР <p class="text-gray-500">POJEMNIK</p>
                        </div>
                      </x-old.table.header>
                      {{-- @if (Auth::user()->hasRole('client'))
                      @else
                      <x-old.table.header>
                      </x-old.table.header>
                      @endif --}}
      
                      <x-old.table.header sortable wire:click="sortBy('containerGoods')" :direction="$sortField === 'containerGoods' ? $sortDirection : null">
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
      
                      @can('show_client')
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
      
                      <x-old.table.header sortable>ЗАМЕТКА УКРАИНА <p class="text-gray-500">NOTATKA&nbsp;UKRAINA</p>
                      </x-old.table.header>
                      <x-old.table.header sortable>ЗАМЕТКА СКЛАДА <p class="text-gray-500">NOTATKA&nbsp;MAGAZYNOWA</p>
                      </x-old.table.header>
                    </x-slot>
                    
                    <x-slot name="body">
                      @forelse($containers as $container)
                      <x-old.table.row class="bg-cool-gray-200">
      
                        <x-old.table.cell>
                          {{ $container->containerNumber}}
                        </x-old.table.cell>
      
                        {{-- @if (Auth::user()->hasRole('client')) --}}
                          
                        {{-- @else --}}
                         <x-old.table.cell>
                          <a href="
                          {{-- {{ route('container.edit',$container->id) }} --}}
                          " class=" inline-flex items-center px-2 py-2  text-indigo-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                          </a>
                        </x-old.table.cell>
                          
                        {{-- @endif --}}
                      
      
                        <x-old.table.cell>
                          {{ $container->containerGoods}}
                          <x-old.test>{{ $container->containerWeight}} &nbsp;{{ $container->destination}}</x-old.test>
                        </x-old.table.cell>
      
      
      
      
                        <x-old.table.cell>
                          {{ $container->port->port }}
                          <x-old.test>{{ $container->line->lineName}}</x-old.test>
                        </x-old.table.cell>
      
      
                        <x-old.table.cell>
                          <span class="inline-flex rounded-full  px-2 text-xs font-semibold leading-5 
                          text-{{ $container->status->color }}-800
                          "
                          >
                            {{ $container->status->status }}
                          </span>
                          {{-- @if (Auth::user()->hasRole('westana')) --}}
                          {{-- @else --}}
                          <x-old.test> {{ $container->expeditor->expeditorName}}</x-old.test>
                          {{-- </span> --}}
                          {{-- @endif --}}
                        </x-old.table.cell>
      
      
                        @can('show_client')
                        <x-old.table.cell class="text-center">
                          <div>
                            <p class="max-w-[300px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">{{$container->client ? $container->client->clientName : ''}}</p>
                          </div>
                        </x-old.table.cell>
                        @endcan
      
      
      
      
      
      
      
                        <x-old.table.cell class="text-center">
                          <x-old.table.steps_name :container='$container'> </x-old.table.steps_name>
                          <x-old.table.steps>{{ $container->position }}</x-old.table.steps>
                        </x-old.table.cell>
      
      
      
                        <x-old.table.cell class="text-center">
      
                          {{ $container->inWork_diff_date > 0 ? $container->inWorkPositionName.$container->inWork_diff_date.'дн.' : '' }}
                          @if($container->oldCs)
                          <x-old.test>СТАРЫЙ КС </x-old.test>
                          @endif
      
                        </x-old.table.cell>
      
                        <x-old.table.cell>
                          <div>
                            <p class="max-w-[300px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">{{ $container->note1}}</p>
                          </div>
                        </x-old.table.cell>
      
                        <x-old.table.cell class="max-w-[200px] whitespace-normal tracking-tight text-ellipsis overflow-hidden ...">
                          {{ $container->note2}}
                        </x-old.table.cell>
      
      
      
      
      
                      </x-old.table.row>
                      @empty
                      <x-old.table.row class="bg-cool-gray-200">
                        <x-old.table.cell colspan="12">НЕТ ТАКИХ ЗАПИСЕЙ / NIE MA TAKICH REJESTRÓW</x-old.table.cell>
                      </x-old.table.row>
                      @endforelse
      
      
                    </x-slot>
                  </x-old.table.table>
      
      
                </div>
              </div>
            </div>
            <div class="py-2">
      
            </div>
          </div>
        </div>
      </div>





</div>
