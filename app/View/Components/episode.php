<?php

namespace App\View\Components;

use Illuminate\View\Component;

class episode extends Component
{
    public $link;
    public $image;
    public $duration;
    public $title;

    public function __construct($link, $image, $duration, $title)
    {
        $this->link = $link;
        $this->image = $image;
        $this->duration = $duration;
        $this->title = $title;
    } 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.episode');
    }
}
