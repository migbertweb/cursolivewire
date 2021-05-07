<div>
    {{-- Tabla con los registro que envia el componente --}}
    <x-table>
        <div class="px-6 py-4 flex items-center">
            <x-input class="flex-1 mr-3" type="text" wire:model="search" placeholder="Buscar" />
            @livewire('create-post')
        </div>
        @if ($posts->count())
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                        Id
                        {{-- sort --}}
                        @if ($sort=='id')
                        @if ($direction=='asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                        @else
                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                        @else
                        <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('title')">
                        Title
                        {{-- sort --}}
                        @if ($sort=='title')
                        @if ($direction=='asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                        @else
                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                        @else
                        <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('content')">
                        Content
                        {{-- sort --}}
                        @if ($sort=='content')
                        @if ($direction=='asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                        @else
                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                        @else
                        <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $item)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $item->id }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $item->title }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $item->content }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                        <a class="btn btn-green" wire:click="edit({{ $item }})">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="px-6 py-4">
            No Existe ningun registro coincidente.
        </div>
        @endif
        {{-- Paginacion de resultados --}}
        @if ($posts->hasPages())
        <div class="px-6 py-3">
            {{ $posts->links() }}
        </div>
        @endif
    </x-table>
    {{-- fin tabla --}}
    {{-- Modal para editar Post --}}
    <x-jet-dialog-modal wire:model="open_edit">
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
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Fin Modal para editar Post --}}
</div>
