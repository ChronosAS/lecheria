<?php

namespace App\Http\Livewire\News;

use App\Models\News\Post;
use Livewire\Component;

class Show extends Component
{
    public $post;
    public $images;

    public function mount(Post $post)
    {
        $this->post= $post;

        $this->images = $this->post->getMedia('post-images');
    }

    public function render()
    {
        return view('livewire.news.show');
    }
}
