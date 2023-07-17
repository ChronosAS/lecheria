<div>
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
                    <span class="visually-hidden">Actions</span>
                </x-table-th>
            </tr>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($posts as $post)
                <tr>
                      <x-table-td>{{ $post->title }}</x-table-td>
                      <x-table-td>{{ $post->subtitle }}</x-table-td>
                      <x-table-td>{{ date('d-m-Y',strtotime($post->created_at)) }}</x-table-td>
                      <x-table-td>Actions</x-table-td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
    <div class="my-3 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
