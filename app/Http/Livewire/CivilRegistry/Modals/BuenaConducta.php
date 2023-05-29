<?php

namespace App\Http\Livewire\CivilRegistry\Modals;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class BuenaConducta extends Component
{
    public $citizen_name;
    public $citizen_civil_status = "";
    public $citizen_nationality = "V";
    public $citizen_birthdate;
    public $citizen_id;
    public $citizen_address;

    protected $rules = [
        'citizen_name' => 'required',
        'citizen_civil_status' => 'required',
        'citizen_birthdate' => 'required',
        'citizen_id' => 'required',
        'citizen_address' => 'required',
    ];

    protected $messages = [
        'citizen_name.required' => 'Porfavor ingrese su nombre completo.',
        'citizen_civil_status.required' => 'Porfavor seleccione su estado civil.',
        'citizen_birthdate.required' => 'Porfavor seleccione su fecha de nacimiento.',
        'citizen_id.required' => 'Porfavor ingrese su numero de identidad.',
        'citizen_address.required' => 'Porfavor ingrese su dirección de domicilio.'
    ];

    public function download()
    {
        $this->validate();
        $age = Carbon::parse($this->citizen_birthdate)->age;
        $data = [
            'citizen_age' => $age,
        ];

        $pdf = $this->loadPDF($data);

        return response()->streamDownload(
            fn () => print($pdf),
            'buena-conducta.pdf'
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

        return Pdf::loadView('documents.buena-conducta-pdf',[
            'citizen_name' => $this->citizen_name,
            'citizen_civil_status' => $this->citizen_civil_status,
            'citizen_age' => $data['citizen_age'],
            'citizen_nationality' => ($this->citizen_nationality == 'V') ? "Venezolano(a)" : "Extrangero(a)",
            'citizen_id' => $this->citizen_id,
            'citizen_address' => $this->citizen_address,
            'date' => $this->getDateEsp(),
        ])->setPaper('letter')->output();
    }

    public function render()
    {
        return view('livewire.civil-registry.modals.buena-conducta');
    }
}
