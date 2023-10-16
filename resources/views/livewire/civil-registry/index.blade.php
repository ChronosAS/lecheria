@push("styles")
    <style>
        [x-cloak] { display: none !important; }
    </style>
@endpush
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
                        <div x-data="{ civil_status: @entangle('citizen_civil_status'), apto: @entangle('address_3_s'),show: @entangle('show'), input: @entangle('input'), edit: @entangle('edit') }" class="col-md-6 col-sm-12 offset-md-3 text-center">
                            <form wire:submit.prevent="download">
                                <div x-show="!show">
                                    <h4>Ingrese su numero de documento</h2>
                                    @error('citizen_search_document')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div class="input-group input-group-sm" style="margin-bottom: 0.65rem">
                                        <select wire:loading.attr='disabled' class="form-select bg-secondary bg-opacity-25 border-dark " style="max-width: 76px;" wire:model.defer="citizen_search_nationality" name="citizen_search_nationality" id="citizen_search_nationality" >
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                        <input type="text" wire:loading.attr='disabled'  class="form-control" wire:model.defer="citizen_search_document" id="citizen_search_document" name="citizen_search_document" placeholder="Buscar documento..."/>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" @click="$wire.clear(); show=true; input=true; edit=false;" name="search-citizen" id="search-citizen">Es la primera vez que lo uso</button>
                                    <button type="button" class="btn btn-success mt-2" @click="$wire.searchCitizen()" name="search-citizen" id="search-citizen">Buscar</button>
                                </div>
                                <div x-cloak x-show="show">
                                    <label for="citizen_search" class="col-form-label text-center" ><h5>Nombre completo</h5></label>
                                    @error('citizen_name')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input x-show="input" type="text" class="form-control" wire:loading.attr='disabled' wire:model.defer="citizen_name" id="citizen_name" name="citizen_name" placeholder="Escriba su nombre completo"/>
                                    <h6 x-show="!input">{{ $citizen_name }}</h6>
                                </div>
                                <div x-cloak x-show="show" x-data="{ selected: false }">
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
                                <div x-cloak x-show="show">
                                    <label for="citizen_birthdate" class="col-form-label text-center"><h5>Fecha de Nacimiento</h5></label>
                                    @error('citizen_birthdate')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <input x-show="input" type="date" class="form-control" id="birthday" name="birthday" wire:loading.attr='disabled' wire:model.defer="citizen_birthdate" placeholder="Seleccione fecha">
                                    <h6 x-show="!input">{{ date('d-m-Y',strtotime($citizen?->birthdate)) }}</h6>
                                </div>
                                <div x-cloak x-show="show">
                                    <label for="citizen_document" class="col-form-label text-center"><h5>Documento</h5></label>
                                    @error('citizen_document')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div x-show="input" class="input-group input-group-sm" style="margin-bottom: 0.65rem" @if($edit) disabled @endif>
                                        <select wire:loading.attr='disabled' class="form-select bg-secondary bg-opacity-25 border-dark " style="max-width: 76px;" wire:model="citizen_nationality" name="citizen_nationality" id="citizen_nationality" @if($edit) disabled @endif>
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                        <input type="text" wire:loading.attr='disabled'  class="form-control" wire:model.defer="citizen_document" id="citizen_document" name="citizen_document" placeholder="Ingrese N° de documento" @if($edit) disabled @endif/>
                                    </div>
                                    <h6 x-show="!input">{{ $citizen_nationality.'-'.$citizen_document }}</h6>
                                </div>
                                <div x-cloak x-show="show">
                                    <h5 class="text-center mb-3">Dirección</h5>
                                    <div class="row mb-2">
                                        @error('address_1_t')
                                            <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                        <div class="col-4">
                                            <select class="form-select border-dark" name="address_1_s" id="address_1_s" wire:model.defer="address_1_s">
                                                <option value="Urbanización">Urbanización</option>
                                                <option value="Sector">Sector</option>
                                                <option value="Barrio">Barrio</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" wire:model="address_1_t" type="text" name="address_1_t" id="address_1_t">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        @error('address_2_t')
                                            <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                        <div class="col-4">
                                            <select class="form-select border-dark" name="address_2_s" id="address_2_s" wire:model.defer="address_2_s">
                                                <option value="Avenida">Avenida</option>
                                                <option value="Calle">Calle</option>
                                                <option value="Vereda">Vereda</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" wire:model="address_2_t" type="text" name="address_2_t" id="address_2_t">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        @error('address_3_t')
                                            <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                        <div class="col-4">
                                            <select class="form-select border-dark" name="address_3_s" id="address_3_s" wire:model="address_3_s">
                                                <option value="Casa">Casa</option>
                                                <option value="Edificio" selected>Edificio</option>
                                                <option value="Habitación">Habitación</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" wire:model="address_3_t" type="text" name="address_3_t" id="address_3_t">
                                        </div>
                                    </div>
                                    <div x-show="apto != 'Casa'" class="row mb-2">
                                        @error('address_4_t')
                                            <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                        <div  class="col-4">
                                            <select class="form-select border-dark" name="address_4_s" id="address_4_s" wire:model.defer="address_4_s">
                                                <option value="Numero">Numero</option>
                                                <option value="Piso">Piso</option>
                                                <option value="Nivel">Nivel</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control" wire:model="address_4_t" type="text" name="address_4_t" id="address_4_t">
                                        </div>
                                    </div>
                                    @error('address_apto')
                                        <p class="text-xs text-danger"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div x-show="apto == 'Edificio'" x-transition class="mb-2">
                                        <input class="form-control" type="text" name="address_apto" id="address_apto" wire:model="address_apto" placeholder="Apartamento">
                                    </div>
                                </div>
                                <div x-cloak x-show="show" class="flex row justify-content-center gx-2 gy-3 btn-toolbar m-3">
                                    <h5>Elija la planilla que desea imprimir</h5>
                                    @error('selected_document')
                                        <p class="text-xs text-center text-danger m-2"><small>{{ $message }}</small></p>
                                    @enderror
                                    <div x-show="civil_status == 'Viudo'" class="col col-lg-4 col-sm-12">
                                        <input type="radio" wire:model='selected_document' class="btn-check" name="selected_document" id="radio-v" autocomplete="off" value="viudez">
                                        <label class="btn btn-outline-primary" for="radio-v">Viudez</label>
                                     </div>
                                    <div x-show="civil_status == 'Soltero'" class="col col-lg-4 col-sm-12">
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
                                <div x-cloak x-show="show" class="flex text-center mb-3">
                                    <hr/>
                                    {{-- <button type="button" @click="show=false" wire:loading.attr='disabled' class="btn btn-primary ml-1">Buscar mi documento</button> --}}
                                    <button x-show="!input" type="button" @click="input=true; edit=true" wire:loading.attr='disabled' class="btn btn-warning ml-1">Editar</button>
                                    <button type="button" @click="$wire.download()" wire:loading.attr='disabled' class="btn btn-success ml-1">Descargar</button>
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
