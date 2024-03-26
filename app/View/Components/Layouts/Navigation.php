<?php

namespace App\View\Components\Layouts;

use App\Models\News\NewsBulletin;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $bulletin_link;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->bulletin_link = 'https://'.NewsBulletin::first()->url ?? '#';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.navigation');
    }
}
