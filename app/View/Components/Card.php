<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $image;
    public $link;
    public $rating;
    public $year;
    public $tags;
    public $tagline;

    public function __construct($title, $image, $link, $rating, $year, $tags,   $tagline)
    {
        $this->title = $title;
        $this->image = $image;
        $this->link = $link;
        $this->rating = $rating;
        $this->year = $year;
        $this->tags = $tags;
        $this->tagline = $tagline;
    }

    public function render()
    {
        return view('components.card');
    }
}
