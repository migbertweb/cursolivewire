<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear nuevo post
    </x-jet-danger-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="p-12 flex flex-col space-y-3">
                <div class="relative w-full bg-gray-200 rounded">
                    <div style="width:100%" class="absolute top-0 h-6 rounded shim-blue">
                    </div>
                </div>
                Cargando Imagen, Por favor Espere.
            </div>
            @if ($image)
            <img class="mb-4 h-100" src="{{ $image->temporaryUrl() }}">
            @endif
            <div class="mb-4">
                <x-jet-label value="Titulo" />
                <x-input type="text" class="w-full" wire:model.defer="title">
                </x-input>
                <x-jet-input-error for='title' />
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del Post" />
                <textarea wire:model.defer="content" class="form-control w-full" rows="6">
            </textarea>
                <x-jet-input-error for='content' />
            </div>
            <div>
                <input type="file" wire:model='image' id="{{ $identificador }}">
                <x-jet-input-error for='image' />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear Post
            </x-jet-danger-button>
            {{-- se muestra cuando se esta cargando alguna accion
            <span wire:loading wire:target="save">Cargando ...</span> --}}
        </x-slot>
    </x-jet-dialog-modal>
</div>