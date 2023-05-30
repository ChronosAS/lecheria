<div>
    <!-- Masthead1-->
    <div>
        <header class="masthead1">
            <!--<div class="container">
            </div>-->
        </header>
        <section class="page-section bg-dark" id="portfolio">
            <div class="container-md rounded p-5 bg-light">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Registro Civil Lechería</h2>
                    <h3 class="section-subheading text-muted">{{-- Conoce los requisitos y --}}Llena y descarga las planillas para tus tramites.</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 offset-md-3 text-center">
                            <form wire:submit.prevent="download">
                                <div>
                                    <label for="citizen_name" class="col-form-label text-center" >Nombre completo</label>
                                    @error('citizen_name')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input type="text" class="form-control" wire:model.defer="citizen_name" id="citizen_name" name="citizen_name" placeholder="Escriba su nombre completo"/>
                                </div>
                                <div x-data="{ selected: false }">
                                    <label for="citizen_civil_status" class="col-form-label text-center">Estado Civil</label>
                                    @error('citizen_civil_status')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <select @change="selected = true" :class="{ 'text-dark': selected }" class="text-secondary form-select border-dark" wire:model.defer="citizen_civil_status" name="citizen_civil_status" id="citizen_civil_status">
                                        <option selected disabled hidden value="" >Elija su estado civil</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="citizen_birthdate" class="col-form-label text-center">Fecha de Nacimiento</label>
                                    @error('citizen_birthdate')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <x-forms.input-date wire:model.defer="citizen_birthdate" id="citizen_birthdate" name="citizen_birthdate" placeholder="Seleccione fecha"/>
                                </div>
                                <div>
                                    <label for="citizen_id" class="col-form-label text-center">Documento</label>
                                    @error('citizen_id')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div class="input-group input-group-sm" style="margin-bottom: 0.65rem">
                                        <select class="form-select bg-secondary bg-opacity-25 border-dark " style="max-width: 76px;" wire:model.defer="citizen_nationality" name="citizen_nationality" id="citizen_nationality">
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                        <input type="text"  class="form-control" wire:model.defer="citizen_id" id="citizen_id" name="citizen_id" placeholder="Ingrese N° de documento"/>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="citizen_address" class="col-form-label text-center">Dirección de domicilio</label>
                                    @error('citizen_address')
                                        <p class="text-xs text-danger m-2"><small>{{ $message }}</small></p>
                                    @enderror
                                    <textarea class="form-control" wire:model.defer="citizen_address" name="citizen_address" id="citizen_address" rows="2" placeholder="Ingrese dirección"></textarea>
                                </div>
                                <div class="flex row justify-content-center gx-2 gy-3 btn-toolbar m-3">
                                    @error('selected_document')
                                        <p class="text-xs text-center text-danger m-2"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model.defer='selected_document' class="btn-check" name="selected_document" id="radio-v" autocomplete="off" value="viudez">
                                        <label class="btn btn-outline-primary" for="radio-v">Viudez</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model.defer='selected_document' class="btn-check" name="selected_document" id="radio-s" autocomplete="off" value="solteria">
                                        <label class="btn btn-outline-primary" for="radio-s">Solteria</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model.defer='selected_document' class="btn-check" name="selected_document" id="radio-fv" autocomplete="off" value="fe-de-vida">
                                        <label class="btn btn-outline-primary" for="radio-fv">Fe de Vida</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model.defer='selected_document' class="btn-check" name="selected_document" id="radio-bc" autocomplete="off" value="buena-conducta">
                                        <label class="btn btn-outline-primary" for="radio-bc">Buena Conducta</label>
                                    </div>
                                </div>
                                <div class="flex text-center mb-3">
                                    <button type="button" class="btn btn-primary mr-1" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" wire:loading.attr='disabled' class="btn btn-success ml-1">Descargar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <livewire:civil-registry.modals.buena-conducta/>
        <livewire:civil-registry.modals.solteria/>
        <livewire:civil-registry.modals.viudez/>
        <livewire:civil-registry.modals.fe-de-vida/> --}}
        {{-- @push('scripts')
            <script>
                config = {
                    allowInput:true,
                    dateFormat: 'd-m-Y',
                }
                flatpickr("input[type=datetime-local]",config);
            </script>
        @endpush --}}
    </div>
</div>
