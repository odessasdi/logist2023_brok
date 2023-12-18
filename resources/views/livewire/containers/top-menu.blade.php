<div class="items-center h-14 bg-white p-0 m-0">
<nav aria-label="Progress">


    <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
      

        <li class="relative md:flex md:flex-1 border border-gray-300 bg-green-50 ">
                <a  href="#" wire:click.prevent="setFiltersPosition({{ '0' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '0')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900"><i class="fas fa-tools"></i>
                        </span>
                    </span>
                    <span class="mt-0.5 ml-2 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">В РАБОТЕ</span>
                        <span class="text-sm font-medium text-gray-500">{{ $in_work }}</span>
                    </span>
                </span>
            </a>
        </li>

        <li class="relative md:flex md:flex-1">
            <a href="#" wire:click.prevent="setFiltersPosition({{ '1' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '1')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">00</span>
                    </span>
                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">ПЛЫВЕТ</span>
                        <span class="text-sm font-medium text-gray-500">{{ $out_ports }}</span>
                    </span>
                </span>
            </a>
            <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                </svg>
            </div>
        </li>

        <li class="relative md:flex md:flex-1">
            <a href="#" wire:click.prevent="setFiltersPosition({{ '2' }})" class="flex items-center px-2 py-1 text-sm font-medium" aria-current="step">
                <span class="flex items-center px-2 py-1 text-sm font-medium">   
                <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '2')  border-indigo-600 @endif group-hover:border-gray-400">
                    <span class="text-indigo-600">01</span>
                </span>
                <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                    <span class="text-sm font-medium">ПОРТ</span>
                    <span class="text-sm font-medium text-gray-500">{{ $ports }}</span>
                </span>
                </span>
            </a>
            <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                </svg>
            </div>
        </li>

        <li class="relative md:flex md:flex-1">

            <a href="#" wire:click.prevent="setFiltersPosition({{ '3' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '3')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">02
                        </span>
                    </span>
                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">СКЛАД</span>
                        <span class="text-sm font-medium text-gray-500">{{ $storage }}</span>
                    </span>
                </span>
            </a>
            <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                </svg>
            </div>
        </li>



        <li class="relative md:flex md:flex-1">
            <a href="#" wire:click.prevent="setFiltersPosition({{ '4' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '4')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">03</span>
                    </span>
                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">POL / RO</span>
                        <span class="text-sm font-medium text-gray-500">{{ $pl }}</span>
                    </span>
                </span>
            </a>
            <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                </svg>
            </div>
        </li>

        <li class="relative md:flex md:flex-1">
            <a href="#" wire:click.prevent="setFiltersPosition({{ '5' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '5')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">04</span>
                    </span>
                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">УКР</span>
                        <span class="text-sm font-medium text-gray-500">{{ $ukr }}</span>
                    </span>
                </span>
            </a>
            <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                </svg>
            </div>
        </li>

        <li class="relative md:flex md:flex-1">
            <a href="#" wire:click.prevent="setFiltersPosition({{ '6' }})" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '6')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">05</span>
                    </span>
                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">ОФОРМЛЕН</span>
                        <span class="text-sm font-medium text-gray-500">{{ $over }}</span>
                    </span>
                </span>
            </a>
        </li> 

          <li class="relative md:flex md:flex-1  border-gray-400  border-double border-4 bg-blue-50">
            <a href="#" wire:click.prevent="resetFiltersPosition" class="group flex items-center">
                <span class="flex items-center px-2 py-1 text-sm font-medium">
                    <span class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full border-2 @if($position == '')  border-indigo-600 @endif group-hover:border-gray-400">
                        <span class="text-gray-500 group-hover:text-gray-900">∑</span>
                    </span>
                    <span class="mt-0.5 ml-2 flex min-w-0 flex-col">
                        <span class="text-sm font-medium">ВСЕ В БАЗЕ</span>
                        <span class="text-sm font-medium text-gray-500">{{ $all }}</span>
                    </span>
                </span>
            </a>
        </li>
    </ol>
</nav>
</div>