<?php

namespace App\Http\Livewire\Admin\News\Edit;

use App\Models\News\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use WithFileUploads;

    public $post;

    public $title;
    public $subtitle;
    public $content;
    // public $images;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;
        $this->subtitle = $post->subtitle;
        $this->content = $post->content;
        // $this->images = $post->getMedia('post-images')->sortBy('order_column');
    }

    // public function moveImageUp($order)
    // {
    //     $image = $this->images->where('order_column',$order)->first();
    //     $prev_image = $this->images->where('order_column',$order-1)->first();
    //     $image->order_column--;
    //     $prev_image->order_column++;
    //     $image->save();
    //     $prev_image->save();
    //     $this->images->sortBy('order_column');
    // }

    // public function deleteImage($index)
    // {
    //     $image = $this->images[$index];

    //     dd($image);
    // }

    public function submit()
    {

        $this->title= Str::lower($this->title);

        $this->validate([
            'title' => ['required','string','max:200','unique:posts'],
            'subtitle' => ['nullable','string','max:200'],
        ],[
            'title.required' => 'Porfavor ingrese un titulo.',
            'title.unique' => 'Ya existe un post con este titulo',
            'max' => 'Maximo de caracteres exedido.',
        ]);

        if($this->content){

            $this->post->update([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'content' => $this->content,
                'slug' => Str::slug($this->title)
            ]);

                return redirect()->route('admin.news.index')->with(['message' => 'Post Creado', 'alert'=>'alert-success']);
            }else {
            return redirect()->route('admin.news.index')->with(['message' => 'Post no contiene contenido','alert'=>'alert-danger']);
        }
    }

    public function render()
    {
        return view('livewire.admin.news.edit.edit')->layout('layouts.admin.app', ['title'=>'Editar Post']);
    }
}
