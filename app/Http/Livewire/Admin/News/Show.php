<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\Post;
use Livewire\Component;

class Show extends Component
{

    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.admin.news.show')->layout('layouts.admin.app');
    }
}
