<div class="m-4">
    <x-alert/>
    <x-table>
        <x-slot name="thead">
            <x-table-th>
                <x-sortable-table-th title="Titulo" field="title" :sortAsc="$sortAsc" :sortField="$sortField" />
            </x-table-th>
            <x-table-th>
                <x-sortable-table-th title="Sub-Titulo" field="subtitle" :sortAsc="$sortAsc" :sortField="$sortField" />
            </x-table-th>
            <x-table-th>
                <x-sortable-table-th title="Fecha de Creacion" field="created_at" :sortAsc="$sortAsc" :sortField="$sortField" />
            </x-table-th>
            <x-table-th>
                <a class="btn btn-success" href="{{ route('admin.news.create') }}" role="button">Crear</a>
            </x-table-th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($posts as $post)
                <tr>
                    <x-table-td>{{ $post->title }}</x-table-td>
                    <x-table-td>{{ $post->subtitle }}</x-table-td>
                    <x-table-td>{{ date('d-m-Y',strtotime($post->created_at)) }}</x-table-td>
                    <x-table-td>
                        <a href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('admin.news.edit',[ 'post' => $post->id]) }}" class="btn btn-warning">Editar</a>
                        @if(!$post->trashed())
                            <button type="button" class="btn btn-danger" wire:click="delete({{ $post->id }})">Eliminar</button>
                        @else
                            <button type="button" class="btn btn-warning" wire:click="restore({{ $post->id }})">Restaurar</button>
                        @endif
                    </x-table-td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Existen Posts</td>
                </tr>
            @endforelse
        </x-slot>
    </x-table>
    <div class="my-3 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
