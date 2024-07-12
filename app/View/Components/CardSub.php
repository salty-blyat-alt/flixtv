<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardSub extends Component
{
    public $image;
    public $link;
    public $title;
    public $description;

    public function __construct($image, $link, $title, $description)
    {
        $this->image = $image;
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.card-sub');
    }
}
