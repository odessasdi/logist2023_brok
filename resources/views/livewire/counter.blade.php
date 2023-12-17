<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Counter') }}
    </h2>
</x-slot>

<div class="py-12">






    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
            <h1>{{ $count }}</h1>

            <button wire:click="increment">+</button>

            <button wire:click="decrement">-</button>
        </div>
    </div> 



</div>
