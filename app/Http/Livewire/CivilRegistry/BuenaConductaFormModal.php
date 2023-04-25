<?php

namespace App\Http\Livewire\CivilRegistry;

use DateTime;
use Carbon\Carbon;
use Livewire\Component;

class BuenaConductaFormModal extends Component
{
    public $citizen_birthdate;
    public $citizen_name;
    public $citizen_nationality;
    public $citizen_id;

    public function print()
    {
        $age = Carbon::parse($this->citizen_birthdate)->age;
        $data = [
            'citizen_age' => $age,
        ];

        dump($this->citizen_nationality);

    }

    public function render()
    {
        return view('livewire.civil-registry.buena-conducta-form-modal');
    }
}
