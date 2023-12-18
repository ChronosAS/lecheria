{{-- @push('blank-styles')
    <style>
        .lecheria-bg {
            background-image: url("/img/lecheria-bg-2.jpg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }
    </style>
@endpush --}}
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
                {{-- <div class="col">
                    <label for="images"><h5>Imagenes</h5></label>
                    <input class="form-control" wire:model="images" type="file" id="images" multiple />
                    @error('images.*')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div> --}}
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
                        @foreach ($images as $index => $image)
                            <tr>
                                <x-table-td>
                                    <input class="form-control form-control-sm" wire:model.defer="images.{{ $index }}.url" type="file" id="images.{{ $index }}.url">
                                    @error('images.*.url')
                                        <span class="text-danger"><b>{{ $message }}</b></span>
                                    @enderror
                                </x-table-td>
                                <x-table-td>
                                    <input class="form-control form-control-sm"
                                    wire:model.defer="images.{{ $index }}.description" type="text" id="images.{{ $index }}.description" name="images.{{ $index }}.description" placeholder="Ingresar...">
                                    @error('images.*.description')
                                        <span class="text-danger"><b>{{ $message }}</b></span>
                                    @enderror
                                </x-table-td>
                                <x-table-td>
                                    <button wire:click="removeImage({{ $index }})" type="button" class="btn btn-warning" style="border-radius: 50%" >
                                        X
                                    </button>
                                </x-table-td>
                            </tr>
                        @endforeach
                        @error('images')
                            <tr><x-table-td colspan="3"><span class="text-danger"><b>{{ $message }}</b></span></x-table-td></tr>
                        @enderror
                    </x-slot>
                </x-table>
            </div>
            <div class="text-center pt-4 m-0">
                <button type="submit" class="btn btn-success">
                    Subir Post
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
                min-height: 35em;
                height: 35em;
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
