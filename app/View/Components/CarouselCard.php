<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarouselCard extends Component
{
    /**
     * Create a new component instance.
     *
     *  
     */
    public $imgSrc;
    public $detailsUrl;
    public $title;
    public $rating;
    public $category;
    public $year;

    public function __construct($imgSrc, $detailsUrl, $title, $rating, $category, $year)
    {
        $this->imgSrc = $imgSrc;
        $this->detailsUrl = $detailsUrl;
        $this->title = $title;
        $this->rating = $rating;
        $this->category = $category;
        $this->year = $year;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel-card');
    }
}
