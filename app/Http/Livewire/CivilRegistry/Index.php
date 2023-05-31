<?php

namespace App\Http\Livewire\CivilRegistry;

use App\Models\Citizen;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $citizen;
    public $citizen_search;
    public $citizen_name;
    public $citizen_civil_status = "";
    public $citizen_nationality = "V";
    public $citizen_birthdate;
    public $citizen_document;
    public $citizen_address;
    public $selected_document;

    public $show = false;
    public $input = true;

    protected $rules = [
        'citizen_search' => 'nullable',
        'citizen_name' => 'required',
        'citizen_civil_status' => 'required',
        'citizen_birthdate' => 'required',
        'citizen_document' => 'required',
        'citizen_address' => 'required',
        'selected_document' => 'required'
    ];

    protected $messages = [
        'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
        'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
        'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
        'citizen_document.required' => 'Porfavor ingrese su numero de identidad.',
        'citizen_address.required' => 'Porfavor ingrese su dirección de domicilio.',
        'selected_document.required' => 'Porfavor elija una planilla para imprimir'
    ];

    public function inputd($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function searchCitizen()
    {
        $this->citizen = Citizen::where('document',$this->citizen_search)->first();

        if($this->citizen)
        {
            $this->citizen_name = $this->citizen->name;
            $this->citizen_civil_status = $this->citizen->civil_status;
            $this->citizen_birthdate = (string) Carbon::parse($this->citizen->birthdate)->format('d-m-Y');
            $this->citizen_nationality = $this->citizen->nationality;
            $this->citizen_document = $this->citizen->document;
            $this->citizen_address = $this->citizen->address;

            $this->show =true;
            $this->input = false;

        }else {
            $this->show = true;
            $this->citizen_document = $this->citizen_search;
        }
    }

    public function download()
    {
        $this->validate([
            'citizen_name' => 'required',
            'citizen_civil_status' => 'required',
            'citizen_birthdate' => 'required',
            'citizen_document' => 'required',
            'citizen_address' => 'required',
            'selected_document' => 'required'
        ],[
            'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
            'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
            'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
            'citizen_document.required' => 'Porfavor ingrese su numero de identidad.',
            'citizen_address.required' => 'Porfavor ingrese su dirección de domicilio.',
            'selected_document.required' => 'Porfavor elija una planilla para imprimir'
        ]);

        if(!$this->citizen)
        {
            $this->citizen = Citizen::create([
                'name' => $this->citizen_name,
                'civil_status' => $this->citizen_civil_status,
                'birthdate' => Carbon::createFromFormat('d-m-Y',$this->citizen_birthdate),
                'nationality' => $this->citizen_nationality,
                'document' => $this->citizen_document,
                'address' => $this->citizen_address
            ]);
        }

        $age = Carbon::parse($this->citizen_birthdate)->age;
        $data = [
            'citizen_age' => $age,
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

        return Pdf::loadView('documents.'.$this->selected_document.'-pdf',[
            'citizen_name' => $this->citizen_name,
            'citizen_civil_status' => $this->citizen_civil_status,
            'citizen_age' => $data['citizen_age'],
            'citizen_nationality' => ($this->citizen_nationality == 'V') ? "Venezolano(a)" : "Extrangero(a)",
            'citizen_document' => $this->citizen_document,
            'citizen_address' => $this->citizen_address,
            'date' => $this->getDateEsp(),
        ])->setPaper('letter')->output();
    }

    public function render()
    {
        return view('livewire.civil-registry.index');
    }
}
