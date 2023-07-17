<div>
    <div class="container bg-white ck-content">
        {!! $content !!}
    </div>
    <div wire:ignore>
        <textarea
            id="editor"
            wire:model="content">
        </textarea>
    </div>
    @push('admin-scripts')
        <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ) )
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
