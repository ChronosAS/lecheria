<?php

namespace App\Http\Livewire\CivilRegistry;

use Livewire\Component;

class Index extends Component
{
    public $entity = [
        'bc' => 'buena-conducta',
        's' => 'solteria'
    ];

    public function render()
    {
        return view('livewire.civil-registry.index');
    }
}
