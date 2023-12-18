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
        $this->images[] = $this->additionalImage();
    }

    public function addImage()
    {
        if (count($this->images) <= 5) {
            $this->images[] = $this->additionalImage();
        }
    }

    public function removeImage($line)
    {
        $this->resetErrorBag();

        unset($this->images[$line]);

        $this->images = array_values($this->images);
    }

    public function additionalImage()
    {
        return [
            'url',
            'description'
        ];
    }

    public function submit()
    {

        $this->validate([
            'title' => ['required','string','max:80'],
            'subtitle' => ['nullable','string','max:124'],
            'images.*.url' => ['required','image','max:4096'],
            'images.*.description' => ['required','string','max:100'],
            'images' => ['required','max:6']
        ],[
            'title.required' => 'Porfavor ingrese un titulo.',
            'max' => 'Maximo de caracteres exedido.',
            'images.max' => 'Ingrese un maximo de 6 imagenes.',
            'images.required' => 'Ingrese un minimo de 1 imagen.',
            'images.*.url.required' => 'El campo de imagen no puede estar vacio.',
            'images.*.description.required' => 'El campo de descripcion no puede estar vacio.',
            'images.*.url.max' => 'Achivo exeden el tamaño maximo de memoria.',
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
                        $post->addMedia($image['url']->getRealPath())
                        ->withCustomProperties(['description'=> $image['description']])
                        ->usingName($image['url']->getClientOriginalName())
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
        return view('livewire.admin.news.create')->layout('layouts.admin.app', ['title'=>'Crear Post']);
    }
}
