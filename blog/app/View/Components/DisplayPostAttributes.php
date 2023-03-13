<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DisplayPostAttributes extends Component
{
    /**
     * Create a new component instance.
     */
    public $authorSlug;
    public $author;
    public $categorySlug;
    public $category;
    public function __construct($author, $authorSlug, $category, $categorySlug)
    {
        $this->authorSlug = $authorSlug;
        $this->author = $author;
        $this->categorySlug = $categorySlug;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.display-post-attributes');
    }
}
