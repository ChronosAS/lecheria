<?php

namespace App\Http\Livewire\Admin\News;

use App\Concerns\CustomPagination;
use App\Models\News\Post;
use Livewire\Component;

class Index extends Component
{
    use CustomPagination;

    public $content;

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
        return view('livewire.admin.news.index',[
            'posts' => $this->loadPosts()
            ])->layout('layouts.admin.app');
    }
}
