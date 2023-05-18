<x-modal id="buenaConductaModal" title="Buena Conducta">
    @push("styles")
        <style>
            select:invalid {
                color:gray;
            }
            option {
                color:black;
            }
        </style>
    @endpush
    <form wire:submit.prevent="download">
        <div>
            <label for="citizen_name" class="col-form-label text-center" >Nombre completo</label>
            <input type="text" class="form-control" wire:model.defer="citizen_name" id="citizen_name" name="citizen_name" placeholder="Escriba su nombre completo" required/>
        </div>
        <div>
            <label for="citizen_civil_status" class="col-form-label text-center">Estado Civil</label>
            <select class="form-select border-dark" wire:model.defer="citizen_civil_status" name="citizen_civil_status" id="citizen_civil_status" required>
                <option selected disabled hidden value="" >Elija su estado civil</option>
                <option value="Soltero(a)">Soltero(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Divorciado(a)">Divorciado(a)</option>
                <option value="Viudo(a)">Viudo(a)</option>
            </select>
        </div>
        <div>
            <label for="citizen_birthdate" class="col-form-label text-center">Fecha de Nacimiento</label>
            <input type="datetime-local" wire:model.defer="citizen_birthdate" id="citizen_birthdate" name="citizen_birthdate"  class="form-control border-dark" placeholder="Seleccione fecha" required/>
        </div>
        <div>
            <label for="citizen_id" class="col-form-label text-center">Documento</label>
            <div class="input-group input-group-sm" style="margin-bottom: 0.65rem">
                <select class="form-select bg-secondary bg-opacity-25 border-dark " style="max-width: 76px;" wire:model.defer="citizen_nationality" name="citizen_nationality" id="citizen_nationality" required>
                    <option value="V" selected>V</option>
                    <option value="E">E</option>
                </select>
                <input type="text"  class="form-control" wire:model.defer="citizen_id" id="citizen_id" name="citizen_id" placeholder="Ingrese N° de documento"/>
            </div>
        </div>
        <div class="mb-4">
            <label for="citizen_address" class="col-form-label text-center">Dirección de domicilio</label>
            <textarea class="form-control" wire:model.defer="citizen_address" name="citizen_address" id="citizen_address" rows="2" placeholder="Ingrese dirección" required></textarea>
        </div>
        <div class="flex text-center mb-3">
            <button type="button" class="btn btn-primary mr-1" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success ml-1">Descargar</button>
        </div>
    </form>
</x-modal>
