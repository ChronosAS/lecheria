<x-modal id="buenaConductaModal">
    <h1>Buena Conducta</h1>
    <form class="row" wire:submit.prevent="download" >
        <div class="row">
            <div class="col-6">
                <div>
                    <label for="citizen_name" class="col-form-lable " >Nombre completo</label>
                    <input type="text" class="form-control" wire:model.defer="citizen_name" name="citizen-name" placeholder="Escriba su nombre completo" required/>
                </div>
                <div>
                    <label for="citizen_birthdate" class="col-form-label pb-0 ">Fecha de Nacimiento</label>
                    <input type="datetime-local" wire:model.defer="citizen_birthdate" id="citizen_birthdate" name="citizen_birthdate"  class="form-control" placeholder="Seleccione fecha" required/>
                </div>
            </div>
            <div class="col-6">
                <div>
                    <label for="citizne_id">Documento</label>
                    <div class="input-group input-group-sm mb-3">
                        <select class="form-select bg-secondary bg-opacity-25 border-dark" style="max-width: 76px;" wire:model.defer="citizen_nationality" name="citizen-nationality">
                            <option value="V" selected>V</option>
                            <option value="E">E</option>
                        </select>
                        <input type="text"  class="form-control" wire:model.defer="citizen_id" name="citizen_id" required/>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 ">Descargar</button>
        </div>
    </form>
</x-modal>
