<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div wire:ignore>
                <textarea
                    id="editor"
                    wire:model="content">
                </textarea>
            </div>
        </div>
        <div class="col-md-6 container">
            <div class="ck-content m-5">
               {!! $content !!}
            </div>
            <figure class="media"><oembed url="https://www.instagram.com/p/BmMZgokAGGQ/?taken-by=nasa"></oembed></figure>
        </div>
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
