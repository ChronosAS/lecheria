<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\Post;
use Livewire\Component;

class Delete extends Component
{

    public $post;

    protected $listeners =[
        'deletePost'
    ];

    public function deletePost(Post $post)
    {
        $this->post = $post;
    }

    public function delete()
    {
        $this->post->delete();

        session()->flash('message','Post eliminado.');
    }

    public function render()
    {
        return view('livewire.admin.news.delete');
    }
}
