<div>
    <x-alert/>
    <div class="container-md p-3">
        <form wire:submit.prevent='update'>
            <div class="row justify-content-center">
                <div class="col-6 pt-2 text-center">
                    <label for="title">
                        <h5>Link</h5>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="url">https://</span>
                        <input type="text" wire:model.defer="url" name="url" id="url" class="form-control">
                    </div>
                    @error('title')
                        <span class="text-danger"><b>{{ $message }}</b></span>
                    @enderror
                </div>
            </div>
            <div class="text-center pt-4 m-0">
                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
