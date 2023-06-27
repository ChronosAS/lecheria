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


    public function searchCitizen()
    {
        $this->validate([
            'citizen_search_document' => ['required','integer','max_digits:10']
        ],[
            'citizen_search_document.integer' => "Porfavor ingrese un numero de documento valido.",
            'citizen_search_document.max_digits' => "Numero de documento no puede tener mas de 10 digitos.",
            'citizen_search_document.required' => "Porfavor ingrese un numero de documento."
        ]);

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

    public function updatedAddress3S()
    {
        if($this->address_3_s != "Edificio"){
            $this->reset("address_apto");
        }
    }

    public function clear()
    {
        $this->reset();
    }

    public function download()
    {

        $this->validate([
            'citizen_name' => ['required','string','max:255'],
            'citizen_civil_status' => ['required'],
            'citizen_birthdate' => ['required','date'],
            'citizen_document' => ['required','integer','max_digits:10'],
            'selected_document' => ['required'],
            'address_1_t' => ['required','string','max:255'],
            'address_2_t' => ['required','string','max:255'],
            'address_3_t' => ['required','string','max:255'],
            'address_4_t' => [Rule::requiredIf($this->address_3_s != 'Casa'),'max:255'],
            'address_apto' => [Rule::requiredIf($this->address_3_s == 'Edificio'),'max:255']
        ], [
            'max' => 'Maximo de caracteres exedido.',
            'address_1_t.required' => 'Porfavor llene los campos de dirección.',
            'address_2_t.required' => 'Porfavor llene los campos de dirección.',
            'address_3_t.required' => 'Porfavor llene los campos de dirección.',
            'address_4_t.required' => 'Porfavor llene los campos de dirección.',
            'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
            'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
            'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
            'citizen_document.required' => 'Porfavor ingrese su numero de identidad.',
            'citizen_document.integer' => 'Caracteres invalidos ingresados.',
            'citizen_document.max_digits' => 'Documento excede el numero de caracteres maximos.',
            'selected_document.required' => 'Porfavor elija una planilla para imprimir.',
            'address_apto.required' => 'Porfavor ingrese su numero de apartamento.'
        ]);

        if(!$this->citizen && !Citizen::where('document',$this->citizen_document)->first()) {
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

        $age = $this->citizen->age;
        $address = collect($this->setAddress())->join(', ');

        if($this->address_3_s == 'Edificio'){
            $address .= ' Apartamento '.$this->address_apto;
        }

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

    public function setAddress()
    {
        if(!$this->address_4_t)
        {
            return [
                $this->address_1_s.' '.$this->address_1_t,
                $this->address_2_s.' '.$this->address_2_t,
                $this->address_3_s.' '.$this->address_3_t,
            ];

        }else
        {
            return [
                $this->address_1_s.' '.$this->address_1_t,
                $this->address_2_s.' '.$this->address_2_t,
                $this->address_3_s.' '.$this->address_3_t,
                $this->address_4_s.' '.$this->address_4_t
            ];
        }
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
