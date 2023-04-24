<?php

namespace App\Http\Livewire\CivilRegistry;

use App\Helpers\pdfHelper;
use DateTime;
use Carbon\Carbon;
use Livewire\Component;

class BuenaConductaFormModal extends Component
{
    public $citizen_birthdate;

    public function submit()
    {
        $age = Carbon::parse($this->citizen_birthdate)->age;
        $data = [
            'citizen_age' => $age,
        ];
        pdfHelper::print($data);

    }

    public function render()
    {
        return view('livewire.civil-registry.buena-conducta-form-modal');
    }
}
