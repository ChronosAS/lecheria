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
                    <hr/>
                    <div class="row">
                        <div x-data="{ show: @entangle('show'), input: @entangle('input'), edit: @entangle('edit') }" class="col-md-6 col-sm-12 offset-md-3 text-center">
                            <form wire:submit.prevent="download">
                                <div x-show="!show">
                                    <h4>Ya a utilizado este servicio antes?</h2>
                                    <label for="citizen_search" class="col-form-label text-center" ><h6>Ingrese su numero de documento</h6></label>
                                    @error('citizen_search')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input type="text" class="form-control" wire:loading.attr='disabled' wire:model.lazy="citizen_search" id="citizen_search" search="citizen_search" placeholder="Buscar documento..."/>
                                    <button type="button" class="btn btn-primary mt-2" @click="show=true; input=true; edit=false" name="search-citizen" id="search-citizen">Es la primera vez que lo uso</button>
                                    <button type="button" class="btn btn-success mt-2" @click="$wire.searchCitizen()" name="search-citizen" id="search-citizen">Buscar</button>
                                </div>
                                <div x-show="show">
                                    <label for="citizen_search" class="col-form-label text-center" ><h5>Nombre completo</h5></label>
                                    @error('citizen_name')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input x-show="input" type="text" class="form-control" wire:loading.attr='disabled' wire:model.lazy="citizen_name" id="citizen_name" name="citizen_name" placeholder="Escriba su nombre completo"/>
                                    <h6 x-show="!input">{{ $citizen_name }}</h6>
                                </div>
                                <div x-show="show" x-data="{ selected: false }">
                                    <label for="citizen_civil_status" class="col-form-label text-center"><h5>Estado Civil</h5></label>
                                    @error('citizen_civil_status')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <select x-show="input" @change="selected = true" :class="{ 'text-dark': selected }" wire:loading.attr='disabled' class="text-secondary form-select border-dark" wire:model="citizen_civil_status" name="citizen_civil_status" id="citizen_civil_status">
                                        <option selected disabled hidden value="" >Elija su estado civil</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                    </select>
                                    <h6 x-show="!input">{{ $citizen_civil_status }}</h6>
                                </div>
                                <div x-show="show">
                                    <label for="citizen_birthdate" class="col-form-label text-center"><h5>Fecha de Nacimiento</h5></label>
                                    @error('citizen_birthdate')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <x-forms.input-date show="input" wire:loading.attr='disabled' wire="lazy" name="citizen_birthdate" placeholder="Seleccione fecha"/>
                                    <h6 x-show="!input">{{ $citizen_birthdate }}</h6>
                                </div>
                                <div x-show="show">
                                    <label for="citizen_document" class="col-form-label text-center"><h5>Documento</h5></label>
                                    @error('citizen_document')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div x-show="input" class="input-group input-group-sm" style="margin-bottom: 0.65rem">
                                        <select wire:loading.attr='disabled' class="form-select bg-secondary bg-opacity-25 border-dark " style="max-width: 76px;" wire:model="citizen_nationality" name="citizen_nationality" id="citizen_nationality" @if($edit) disabled @endif>
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                        <input type="text" wire:loading.attr='disabled'  class="form-control" wire:model.lazy="citizen_document" id="citizen_document" name="citizen_document" placeholder="Ingrese N° de documento" @if($edit) disabled @endif/>
                                    </div>
                                    <h6 x-show="!input">{{ $citizen_nationality.'-'.$citizen_document }}</h6>
                                </div>
                                <div x-show="show" class="mb-4">
                                    <label for="citizen_address" class="col-form-label text-center"><h5>Dirección de domicilio</h5></label>
                                    @error('citizen_address')
                                        <p class="text-xs text-danger m-2"><small>{{ $message }}</small></p>
                                    @enderror
                                    <textarea class="form-control" wire:loading.attr='disabled' wire:model.lazy="citizen_address" name="citizen_address" id="citizen_address" rows="2" placeholder="Ingrese dirección"></textarea>
                                    <h6 x-show="!input">{{ $citizen_address }}</h6>
                                </div>
                                <div x-show="show" class="flex row justify-content-center gx-2 gy-3 btn-toolbar m-3">
                                    <h5>Elija la planilla que desea imprimir</h5>
                                    @error('selected_document')
                                        <p class="text-xs text-center text-danger m-2"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model='selected_document' class="btn-check" name="selected_document" id="radio-v" autocomplete="off" value="viudez">
                                        <label class="btn btn-outline-primary" for="radio-v">Viudez</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model='selected_document' class="btn-check" name="selected_document" id="radio-s" autocomplete="off" value="solteria">
                                        <label class="btn btn-outline-primary" for="radio-s">Solteria</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model='selected_document' class="btn-check" name="selected_document" id="radio-fv" autocomplete="off" value="fe-de-vida">
                                        <label class="btn btn-outline-primary" for="radio-fv">Fe de Vida</label>
                                    </div>
                                    <div class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model='selected_document' class="btn-check" name="selected_document" id="radio-bc" autocomplete="off" value="buena-conducta">
                                        <label class="btn btn-outline-primary" for="radio-bc">Buena Conducta</label>
                                    </div>
                                </div>
                                <div x-show="show" class="flex text-center mb-3">
                                    <hr/>
                                    <button type="button" @click="show=false" wire:loading.attr='disabled' class="btn btn-primary ml-1">Buscar mi documento</button>
                                    <button x-show="!input" type="button" @click="input=true; edit=true" wire:loading.attr='disabled' class="btn btn-warning ml-1">Editar</button>
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
