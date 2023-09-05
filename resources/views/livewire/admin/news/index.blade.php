<div>
    <x-alert/>
    <x-table>
        <x-slot name="thead">
            <tr>
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
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($posts as $post)
                <tr>
                      <x-table-td>{{ $post->title }}</x-table-td>
                      <x-table-td>{{ $post->subtitle }}</x-table-td>
                      <x-table-td>{{ date('d-m-Y',strtotime($post->created_at)) }}</x-table-td>
                      <x-table-td>
                        <a href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}" class="btn btn-primary">Ver</a>
                        <button type="button" wire:click='$emit(deletePost,{{ $post->id }})' data-bs-toggle="modal" data-bs-target="#deletePostModal" class="btn btn-danger">Eliminar</button>
                    </x-table-td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Existen Posts</td>
                </tr>
            @endforelse
        </x-slot>
    </x-table>
    {{-- <livewire:admin.news.delete> --}}
    <div class="my-3 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
