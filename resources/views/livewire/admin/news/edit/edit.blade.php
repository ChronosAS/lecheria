<div>
    <x-alert/>
    <div class="justify-content-center container-md p-3">
        <form wire:submit.prevent="submit">
            <div class="row pt-2">
                <div class="col-sm-4 pt-2 text-center ">
                    <label for="title">
                        <h5>Titulo</h5>
                    </label>
                    <input type="text" wire:model="title" name="title" id="title" class="form-control">
                    @error('title')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
                <div class="col-sm-8 pt-2 text-center ">
                    <label for="subtitle">
                        <h5>Sub Titulo</h5>
                    </label>
                    <input type="text" wire:model="subtitle" name="subtitle" id="subtitle" class="form-control">
                    @error('subtitle')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
            </div>
            <div class="row text-center pt-2 ">
                <livewire:admin.news.edit.additionals.images-table :post="$post">
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
    @push('styles')
        <style>
            .ck.ck-content:not(.ck-comment__input *) {
                height: 20rem;
            }
        </style>
    @endpush
    @push('scripts')
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
