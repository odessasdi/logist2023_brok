<div>
    <x-my.modal name="modal"  title={{$formtitle}}>
        <div>
            <form>
                <x-slot:form >
                    <x-my.form.input wire:model.live='title' :label="'title'" >
                     <div>
                        @error('title')
                        <p class="mt-1 text-sm text-red-600" id="title-error">{{ $message }}</p>
                        @enderror
                    </div>
                    </x-my.form.input>


                    <x-my.form.input wire:model.live='content' :label="'content'" >
                        <div>
                           @error('content')
                           <p class="mt-1 text-sm text-red-600" id="content-error">{{ $message }}</p>
                           @enderror
                       </div>
                       </x-my.form.input>
                </x-slot>

                <x-slot:buttons>
                    @if ($formtitle == 'ИЗМЕНИТЬ ЗАПИСЬ')
                        <x-my.button.primary wire:click="update">СОХРАНИТЬ</x-my.button.primary>
                        <x-my.button.secondary wire:click="closeModal">ОТМЕНА</x-my.button.secondary>
                    @else
                        <x-my.button.primary wire:click="save">СОХРАНИТЬ</x-my.button.primary>
                        <x-my.button.secondary wire:click="closeModal">ОТМЕНА</x-my.button.secondary>
                    @endif
                </x-slot>
            </form>
        </div>
    </x-my.modal>
</div>
