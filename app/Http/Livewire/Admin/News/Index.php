<?php

namespace App\Http\Livewire\Admin\News;

use Livewire\Component;

class Index extends Component
{
    public $content;

    public function render()
    {
        return view('livewire.admin.news.index')->layout('layouts.admin.app');
    }
}
