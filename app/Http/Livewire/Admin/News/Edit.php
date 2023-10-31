<?php

namespace App\Http\Livewire\Admin\News;

use App\Models\News\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $post;

    public $title;
    public $subtitle;
    public $content;
    public $images = [];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;
        $this->subtitle = $post->subtitle;
        $this->content = $post->content;
        $this->images = $post->getMedia('post-images');
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

            $this->post->update([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'content' => $this->content,
                'slug' => Str::slug($this->title)
            ]);

            if($this->images){
                foreach ($this->images as $image) {
                    $this->post->addMedia($image->getRealPath())
                    ->usingName($image->getClientOriginalName())
                    ->toMediaCollection('post-images');
                    }
                }
                return redirect()->route('admin.news.index')->with(['message' => 'Post Creado', 'alert'=>'alert-success']);
            }else {
            return redirect()->route('admin.news.index')->with(['message' => 'Post no contiene contenido','alert'=>'alert-danger']);
        }
    }

    public function render()
    {
        return view('livewire.admin.news.edit')->layout('layouts.blank', ['title'=>'Crear Post']);
    }
}
