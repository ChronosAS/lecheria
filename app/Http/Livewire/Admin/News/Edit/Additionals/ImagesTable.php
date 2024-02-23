<?php

namespace App\Http\Livewire\Admin\News\Edit\Additionals;

use App\Models\News\Post;
use Livewire\Component;

class ImagesTable extends Component
{
    public Post $post;
    public $images;
    public $a = 0;

    protected $listeners = [
        'refreshTable' => '$refresh'
    ];

    public function mount($post)
    {
        $this->post = $post;
        $this->images = $this->getImages();
    }

    public function getImages()
    {
        return $this->post->getMedia('post-images')->sortBy('order_column');
    }

    public function moveImageUp($order)
    {

        $image = $this->images->where('order_column',$order)->first();
        $prev_image = $this->images->where('order_column',$order-1)->first();

        $image->order_column--;
        $prev_image->order_column++;

        $image->save();
        $prev_image->save();

        $this->getImages();
        // $this->emitUp('refreshComponent');
        $this->emit('$refresh');
    }

    public function moveImageDown($order)
    {

        $image = $this->images->where('order_column',$order)->first();
        $next_image = $this->images->where('order_column',$order+1)->first();

        $image->order_column++;
        $next_image->order_column--;

        $image->save();
        $next_image->save();

        $this->getImages();
        // $this->emitUp('refreshComponent');
        $this->emit('$refresh');
    }

    public function deleteImage($index)
    {
        $image = $this->images[$index];

        dd($image);
    }
    public function render()
    {
        $this->a++;
        return view('livewire.admin.news.edit.additionals.images-table');
    }
}
