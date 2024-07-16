<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $image;
    public $title;
    public $value;
    public $link;

    public function __construct($image, $title, $value, $link)
    {
        $this->image = $image;
        $this->title = $title;
        $this->value = $value;
        $this->link = $link;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-card');
    }
}
