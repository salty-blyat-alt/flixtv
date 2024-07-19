<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardSub extends Component
{
    public $image;
    public $link;
    public $title;

    public function __construct($image, $link, $title)
    {
        $this->image = $image;
        $this->link = $link;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.card-sub');
    }
}
