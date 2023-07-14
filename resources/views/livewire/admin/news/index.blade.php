<div>
    {{-- <div>
        <table class="table table-fixed table-striped table-borderless">
            <thead class="table-dark">
            <tr>
              <th scope="col ">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
            </tbody>
          </table>
    </div> --}}
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
    {{-- @push('admin-styles')

        <style>
            .ck-editor__editable {
                min-height: 150px;
            }
        </style>
    @endpush --}}
</div>
