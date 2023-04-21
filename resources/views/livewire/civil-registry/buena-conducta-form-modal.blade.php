<x-modal id="buenaConductaModal">
    <h1>Buena Conducta</h1>
    <form class="row">
        <label for="date" class="col-1 col-form-label">Date</label>
        <input type="datetime-local" class="form-control" placeholder="Select Date"/>
        <a href="{{ route('civil-registry.buena-conducta.generate-pdf') }}" target="_blank" class="form-control">Print</a>
    </form>
</x-modal>
