<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $content;
    public $images = [];


    public function mount()
    {
        $this->content = "<h1>Title</h1>";
    }

    public function submit()
    {

        $this->validate([
            'title' => ['required','string','max:80'],
            'subtitle' => ['nullable','string','max:124'],
            'images.*' => ['nullable','image','max:4096'],
            'images' => ['max:4']
        ],[
            'title.required' => 'Porfavor ingrese un titulo.',
            'max' => 'Maximo de caracteres exedido.',
            'images.max' => 'Ingrese un maximo de 4 imagenes',
            'images.*.max' => 'Achivos exeden el tamaño maximo de memoria',
        ]);

        if($this->content){
            tap(Post::create([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'content' => $this->content,
                'slug' => Str::slug($this->title)
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
