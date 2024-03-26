<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\NewsBulletin;
use Livewire\Component;

class BulletinLink extends Component
{
    public $bulletin;

    public $url;

    public function getLink()
    {
        $this->bulletin = NewsBulletin::firstOrCreate(['id'=>1]);

        $this->url = $this->bulletin->url ?? '';
    }

    public function update()
    {
        $this->validate([
            'url' => 'required'
        ]);

        $this->bulletin->update(['url' => $this->url]);

        session()->flash('message','Link Actualizado');
    }
    public function render()
    {
        return view('livewire.admin.news.bulletin-link',[
            'url' => $this->getLink()
        ])->layout('layouts.admin.new-app', ['title'=>'Boletín de Noticias']);
    }
}
