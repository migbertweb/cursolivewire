<div>
    <a class="btn btn-green" wire:click="$set('open',true)">
        <i class="fas fa-edit"></i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Post
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
            @else
            <img src="{{ Storage::url($post->image) }}">
            @endif
            <div class="mb-4">
                <x-jet-label value="Titulo del Post" />
                <x-input type="text" class="w-full" wire:model="post.title">
                </x-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Contenido del Post" />
                <textarea wire:model="post.content" class="form-control w-full" rows="6">
            </textarea>
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
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
