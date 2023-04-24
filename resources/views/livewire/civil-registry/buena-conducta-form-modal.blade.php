<x-modal id="buenaConductaModal">
    <h1>Buena Conducta</h1>
    <form class="row" wire:submit.prevent="submit" >
        <label for="citizen_birthdate" class="col-form-label text-align-left">Fecha de Nacimiento</label>
        <input type="datetime-local" wire:model.defer="citizen_birthdate" name="citizen_birthdate"  class="form-control" placeholder="Seleccione fecha"/>
        <button type="submit" class="form-control">Print</button>
    </form>
</x-modal>
