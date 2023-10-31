<?php

namespace App\Http\Livewire\News;

use App\Models\News\Post;
use Livewire\Component;
use App\Concerns\CustomPagination;

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
            ->search($this->search)
            ->orderBy($this->sortField ?? 'id', $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.news.index',[
                'posts' => $this->loadPosts()
            ]);
    }
}
