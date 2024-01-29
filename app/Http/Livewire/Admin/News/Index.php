<?php

namespace App\Http\Livewire\Admin\News;

use App\Concerns\CustomPagination;
use App\Models\News\Post;
use Livewire\Component;

class Index extends Component
{
    use CustomPagination;

    public $sortField = null;

    protected $queryString = [
        'sortField' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortAsc' => ['except' => false]

    ];

    private function loadPosts()
    {
        return Post::query()
            ->select([
                'id',
                'title',
                'subtitle',
                'slug',
                'content',
                'created_at',
                'updated_at',
                'deleted_at'
            ])
            ->withTrashed()
            ->search($this->search)
            ->orderBy($this->sortField ?? 'id', $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage);
    }

    public function delete(Post $post)
    {
        $post->forceDelete();

        session()->flash('message','Post Eliminado');
        session()->flash('alert','alert-danger');

    }

    public function restore($post)
    {
        (Post::withTrashed()->find($post))->restore();

        session()->flash('message','Post Restaurado');
        session()->flash('alert','alert-success');
    }

    public function render()
    {
        return view('livewire.admin.news.index',[
            'posts' => $this->loadPosts()
            ])->layout('layouts.admin.app');
    }
}
