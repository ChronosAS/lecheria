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
                        <div class="btn-group">
                            @if ($index != 0)
                            <a wire:click.defer="moveImageUp({{ $image->order_column }})" class="btn btn-primary">
                                <i class="fas fa-arrow-up"></i>
                            </a>
                            @endif
                            @if($index != count($images)-1)
                            <a wire:click.defer="moveImageDown({{ $image->order_column }})" class="btn btn-primary">
                                <i class="fas fa-arrow-down"></i>
                            </a>
                            @endif
                            <a wire:click="deleteImage({{ $index }})" class="btn btn-danger">
                                <i class="fas fa-window-close"></i>
                            </a>
                        </div>
                    </x-table-td>
                </tr>
            @empty
                <tr><h2>No hay imagenes en este post</h2></tr>
            @endforelse
        </x-slot>
    </x-table>
</div>
