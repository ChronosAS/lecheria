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
        // $image_num = count($this->images);
        // switch ($image_num) {
        //     case ($image_num > 0):
        //         # code...
        //         break;

        //     default:
        //         # code...
        //         break;
        // }

        return view('livewire.news.show');
    }
}
