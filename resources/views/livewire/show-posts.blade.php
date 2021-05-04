<div>
    <x-table>
        <div class="px-6 py-4">
            <x-input class="w-full" type="text" wire:model="search" placeholder="Buscar" />
        </div>
        @if ($posts->count())
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
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
                @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $post->id }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $post->title }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $post->content }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
    </x-table>
</div>