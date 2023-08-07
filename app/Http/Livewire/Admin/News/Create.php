<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $content;
    public $images = [];

    public function submit()
    {
        $this->validate([
            'title' => ['required','string','max:62'],
            'subtitle' => ['nullable','string','max:124'],
            'images.*' => ['nullable','image','max:1024'],
        ]);

        if($this->content){
            tap(Post::create([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'content' => $this->content
            ]),function($post){
                if($this->images){
                    foreach ($this->images as $image) {
                        $post->addMedia($image->getRealPath())
                        ->usingName($image->getClientOriginalName())
                        ->toMediaCollection('post-images');
                    }
                }
            });

            return redirect()->route('admin.news.index')->with(['message' => 'Post Creado', 'alert'=>'alert-success']);
        }else {
            return redirect()->route('admin.news.index')->with(['message' => 'Post no contiene contenido','alert'=>'alert-danger']);
        }
    }

    public function render()
    {
        return view('livewire.admin.news.create')->layout('layouts.blank', ['title'=>'Crear Post']);
    }
}
