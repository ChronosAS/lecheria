<?php

namespace App\Http\Livewire\Admin\News;

use Livewire\Component;

class Index extends Component
{
    public $message;

    public function updatedMessage()
    {
        dd($this->message);
    }

    public function render()
    {
        return view('livewire.admin.news.index')->layout('layouts.admin.app');
    }
}
