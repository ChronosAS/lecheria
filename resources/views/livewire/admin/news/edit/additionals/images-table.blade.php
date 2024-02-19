<div>
    <x-table>
        <x-slot name="thead">
            <x-table-th class="pb-3 col-4">
                Imagenes
            </x-table-th>
            <x-table-th class="pb-3">
                Pie de foto
            </x-table-th>
            <x-table-th class="col-2">
                <button type="button" class="btn btn-secondary" wire:click="addImage">Agregar</button>
            </x-table-th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($images as $index => $image)
                <tr>
                    <x-table-td>
                        {{ $image->name }}
                    </x-table-td>
                    <x-table-td>
                        {{ $image->getCustomProperty('description') }}
                    </x-table-td>
                    <x-table-td>
                        <button wire:click="deleteImage({{ $index }})" type="button" class="btn btn-warning" style="border-radius: 50%" >
                            X
                        </button>
                        @if ($index != 0)
                            <button wire:click.defer="moveImageUp({{ $image->order_column }})" type="button" class="btn m-1">
                                subir
                            </button>
                        @endif
                        @if($index != count($images)-1)
                            <button wire:click.defer="moveImageDown({{ $image->order_column }})" type="button" class="btn">
                                bajar
                            </button>
                        @endif
                    </x-table-td>
                </tr>
            @empty
                <tr><h2>No hay imagenes en este post</h2></tr>
            @endforelse
        </x-slot>
    </x-table>
</div>
