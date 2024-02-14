<div>
    <x-alert/>
    <div class="justify-content-center container-md p-3">
        <form wire:submit.prevent="submit">
            <div class="row pt-2">
                <div class="col-sm-4 pt-2 text-center text-white">
                    <label for="title">
                        <h5>Titulo</h5>
                    </label>
                    <input type="text" wire:model="title" name="title" id="title" class="form-control">
                    @error('title')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
                <div class="col-sm-8 pt-2 text-center text-white">
                    <label for="subtitle">
                        <h5>Sub Titulo</h5>
                    </label>
                    <input type="text" wire:model="subtitle" name="subtitle" id="subtitle" class="form-control">
                    @error('subtitle')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
            </div>
            <div class="row text-center pt-2 text-white">
                <livewire:admin.news.edit.additionals.images-table :post="$post">
                {{-- <x-table>
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
                                        <button wire:click.defer="moveImageUp({{ $image->order_column }})" type="button" class="btn">
                                            subir
                                        </button>
                                    @endif
                                </x-table-td>
                            </tr>
                        @empty
                            <tr><h2>No hay imagenes en este post</h2></tr>
                        @endforelse
                    </x-slot>
                </x-table> --}}
            </div>
            <div class="text-center pt-4 m-0">
                <button type="submit" class="btn btn-success">
                    Editar Post
                </button>
                <a href="javascript:history.back()" class="btn btn-danger">Cancelar</a>
            </div>
            <div wire:ignore class="pt-4">
                <textarea
                    id="editor"
                    wire:model="content">
                    {{ $content }}
                </textarea>
            </div>
        </form>
    </div>
    @push('admin-styles')
        <style>
            .ck.ck-content:not(.ck-comment__input *) {
                height: 100vh;
            }
        </style>
    @endpush
    @push('admin-scripts')
        <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ), {
                mediaEmbed: {previewsInData: true}
            } )
            .then(function(editor) {
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                })
            })
            .catch( error => {
                console.error( error );
            } );
        </script>
    @endpush
</div>
