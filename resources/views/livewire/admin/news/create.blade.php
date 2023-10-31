@push('blank-styles')
    <style>
        .lecheria-bg {
            background-image: url("/img/lecheria-bg-2.jpg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }
    </style>
@endpush
<div class="p-5 lecheria-bg">
    @if(session()->has('message'))
        <div class="alert {{ session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
    @endif
    <div class="justify-content-center border border-dark container-md bg-secondary rounded p-3">
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
                <div class="col">
                    <label for="images"><h5>Imagenes</h5></label>
                    <input class="form-control" wire:model="images" type="file" id="images" multiple />
                    @error('images.*')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
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
    @push('blank-styles')
        <style>
            .ck.ck-content:not(.ck-comment__input *) {
                height: 100vh;
            }
        </style>
    @endpush
    @push('blank-scripts')
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
