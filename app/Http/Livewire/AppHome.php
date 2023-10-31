<?php

namespace App\Http\Livewire;

use App\Models\News\Post;
use Livewire\Component;

class AppHome extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::latest()->take(4)->get();
    }

    public function render()
    {
        return view('app-home');
    }
}
