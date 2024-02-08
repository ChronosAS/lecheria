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
        $this->images = $post->getMedia('post-images')->sortBy('order_column');
    }

    public function moveImageUp($index)
    {
        $image = $this->images[$index];
        $image2 = $this->images[$index];
        $image2->order_column += 1;
        $image->order_column -= 1 ;
        $image->save();
        $image2->save();
        dd($this->images);
    }

    public function deleteImage($index)
    {
        $image = $this->images[$index];

        dd($image);
    }

    public function submit()
    {

        $this->title= Str::lower($this->title);

        $this->validate([
            'title' => ['required','string','max:200','unique:posts'],
            'subtitle' => ['nullable','string','max:200'],
            'images.*.url' => ['required','image','max:4096'],
            'images.*.description' => ['nullable','string','max:100'],
            'images' => ['required','max:10']
        ],[
            'title.required' => 'Porfavor ingrese un titulo.',
            'title.unique' => 'Ya existe un post con este titulo',
            'max' => 'Maximo de caracteres exedido.',
            'images.max' => 'Ingrese un maximo de 10 imagenes.',
            'images.required' => 'Ingrese un minimo de 1 imagen.',
            'images.*.url.required' => 'El campo de imagen no puede estar vacio.',
            'images.*.description.required' => 'El campo de descripcion no puede estar vacio.',
            'images.*.url.max' => 'Achivo exeden el tamaño maximo de memoria.',
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
        return view('livewire.admin.news.edit')->layout('layouts.admin.app', ['title'=>'Editar Post']);
    }
}
