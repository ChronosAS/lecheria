<?php

namespace App\Http\Livewire\News;

use App\Models\News\Post;
use Livewire\Component;

class Index extends Component
{

    public $news;

    public function mount()
    {
        $this->news = $this->loadPosts();
    }

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
        return view('livewire.news.index');
    }
}
