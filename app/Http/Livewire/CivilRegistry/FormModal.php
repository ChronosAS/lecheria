<?php

namespace App\Http\Livewire\CivilRegistry;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class FormModal extends Component
{

    public $entity;
    public $citizen_name;
    public $citizen_civil_status = "";
    public $citizen_nationality;
    public $citizen_birthdate;
    public $citizen_id;
    public $citizen_address;


    protected $listeners = [
        'entity'
    ];

    public function entity($entity)
    {
        $this->entity = $entity;
    }

    public function download()
    {
        $age = Carbon::parse($this->citizen_birthdate)->age;
        $data = [
            'citizen_age' => $age,
        ];

        $pdf = $this->loadPDF($data);

        return response()->streamDownload(
            fn () => print($pdf),
            'civil-registry.pdf'
        );

    }

    protected function loadPDF($data)
    {
        return Pdf::loadView('documents.civil-registry-pdf',[
            'citizen_age' => $data['citizen_age']
        ])->setPaper('letter')->output();
    }

    public function render()
    {
        return view('livewire.civil-registry.form-modal');
    }
}