<?php

namespace App\Http\Livewire\CivilRegistry;

use App\Models\Citizen;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public $citizen;
    public $citizen_search_document;
    public $citizen_search_nationality = "V";
    public $citizen_name;
    public $citizen_civil_status = "";
    public $citizen_nationality = "V";
    public $citizen_birthdate;
    public $citizen_document;
    public $address;
    public $address_1_s = "Urbanización";
    public $address_1_t;
    public $address_2_s = "Avenida";
    public $address_2_t;
    public $address_3_s = "Casa";
    public $address_3_t;
    public $address_4_s = "Numero";
    public $address_4_t;
    public $address_apto;
    public $selected_document;

    public $show = false;
    public $input = true;
    public $edit = false;

    protected $rules = [
        'citizen_search_nationality' => ['nullable'],
        'citizen_search_document' => ['nullable'],
        'citizen_name' => ['required'],
        'citizen_civil_status' => ['required'],
        'citizen_birthdate' => ['required'],
        'citizen_document' => ['required'],
        'selected_document' => ['required']
        ];

    protected $messages = [
            'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
            'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
            'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
            'citizen_document.required' => 'Porfavor ingrese su numero de identidad.',
            'citizen_address.required' => 'Porfavor ingrese su dirección de domicilio.',
            'selected_document.required' => 'Porfavor elija una planilla para imprimir',
        ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function searchCitizen()
    {
        $this->citizen = Citizen::where('document', $this->citizen_search_document)
            ->where('nationality', $this->citizen_search_nationality)
            ->first();

        if($this->citizen) {
            $this->citizen_name = $this->citizen->name;
            $this->citizen_civil_status = $this->citizen->civil_status;
            $this->citizen_birthdate = $this->citizen->birthdate;
            $this->citizen_nationality = $this->citizen->nationality;
            $this->citizen_document = $this->citizen->document;

            $this->input = false;

        } else {
            $this->resetExcept(['citizen_search_nationality','citizen_search_document']);
            $this->citizen_nationality = $this->citizen_search_nationality;
            $this->citizen_document = $this->citizen_search_document;
        }

        $this->show =true;
    }

    public function clear()
    {
        $this->reset();
    }

    public function download()
    {
        $this->validate([
            'citizen_name' => 'required',
            'citizen_civil_status' => 'required',
            'citizen_birthdate' => 'required',
            'citizen_document' => ['required'],
            'selected_document' => 'required',
            'address_apto' => [Rule::requiredIf($this->address_3_s == 'Edificio')]
        ], [
            'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
            'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
            'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
            'citizen_document.required' => 'Porfavor ingrese su numero de identidad.',
            'selected_document.required' => 'Porfavor elija una planilla para imprimir',
            'address_apto.required' => 'Porfavor ingrese su numero de apartamento'
        ]);



        if(!$this->citizen) {
            $this->citizen = Citizen::create([
                'name' => $this->citizen_name,
                'civil_status' => $this->citizen_civil_status,
                'birthdate' => $this->citizen_birthdate,
                'nationality' => $this->citizen_nationality,
                'document' => $this->citizen_document,
            ]);
        }

        if($this->edit) {
            $this->citizen->update([
                'name' => $this->citizen_name,
                'civil_status' => $this->citizen_civil_status,
                'birthdate' => $this->citizen_birthdate,
                'nationality' => $this->citizen_nationality,
                'document' => $this->citizen_document,
            ]);
        }

        $age = Carbon::parse($this->citizen_birthdate)->age;

        $address = $this->address_1_s + ' ' + $this->address_1_t + ', ' + $this->address_2_s + ' ' + $this->address_2_t + ', ' + $this->address_3_s + ' ' + $this->address_3_t + ', ' + $this->address_4_s + ' ' + $this->address_4_t + ' Apartamento N° ' + $this->address_apto;

        $data = [
            'citizen_age' => $age,
            'citizen_address' => $address
        ];

        $pdf = $this->loadPDF($data);

        return response()->streamDownload(
            fn () => print($pdf),
            $this->selected_document.'.pdf'
        );

    }

    public function getDateEsp()
    {
        $day = date('d');
        $months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $month = $months[date('n')-1];
        $year = date('Y');

        return array('day'=>$day,'month'=>$month,'year'=>$year);

    }

    protected function loadPDF($data)
    {

        return Pdf::loadView('documents.'.$this->selected_document.'-pdf', [
            'citizen_name' => $this->citizen_name,
            'citizen_civil_status' => $this->citizen_civil_status,
            'citizen_age' => $data['citizen_age'],
            'citizen_nationality' => ($this->citizen_nationality == 'V') ? "Venezolano(a)" : "Extrangero(a)",
            'citizen_document' => $this->citizen_document,
            'citizen_address' => $data['citizen_address'],
            'date' => $this->getDateEsp(),
        ])->setPaper('letter')->output();
    }

    public function render()
    {
        return view('livewire.civil-registry.index');
    }
}
