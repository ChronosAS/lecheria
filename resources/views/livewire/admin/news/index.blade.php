{{-- <div>
    <div
        class="form-textarea w-full"
        x-data
        x-init="
            ClassicEditor.create($refs.ref)
            .then( function(editor){
                editor.model.document.on('change:data', () => {
                $dispatch('input', editor.getData())
                })
            })
            .catch( error => {
                console.error( error );
            } );
        "
        wire:ignore
        wire:key="ref"
        x-ref="ref"
        wire:model.debounce.9999999ms="message"
    >{!! $message !!}</div>
</div> --}}

{{-- <div wire:ignore >
    <textarea wire:model="message" class="form-control" name="message" id="message">
    </textarea>
    <h1 class="text-black">{{ $message }}</h1>
</div>
@push('admin-scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#message' ) )
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('message', editor.getData());
                })
            })
            .catch( error => {
            console.error( error );
    } );
    </script>
@endpush --}}
