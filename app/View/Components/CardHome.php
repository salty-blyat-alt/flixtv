<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardHome extends Component
{
    public $link;
    public $image;
    public $title;

    public function __construct($link, $image, $title)
    {
        $this->link = $link;
        $this->image = $image;
        $this->title = $title;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-home');
    }
}
