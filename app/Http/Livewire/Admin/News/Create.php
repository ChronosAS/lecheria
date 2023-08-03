<?php

namespace App\Http\Livewire\Admin\News;

use Livewire\Component;

class Create extends Component
{
    public $content;

    public function render()
    {
        return view('livewire.admin.news.create')->layout('layouts.blank', ['title'=>'Crear Post']);
    }
}
