<?php

namespace App\Http\Livewire\CivilRegistry;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class BuenaConductaFormModal extends Component
{
    public $citizen_birthdate;
    public $citizen_name;
    public $citizen_nationality;
    public $citizen_id;

    protected $listeners  = [
        'testEvent' => 'testEventAction'
    ];

    public function download()
    {

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

    public function testEventAction()
    {
        dd("Event");
    }

    protected function loadPDF($data)
    {
        return Pdf::loadView('documents.buena-conducta-pdf',[
            'citizen_age' => $data['citizen_age']
        ])->setPaper('letter')->output();
    }

    public function render()
    {
        return view('livewire.civil-registry.buena-conducta-form-modal');
    }
}
