<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getHome(){
        return view('pages.index2');
    } 
    public function getMovie(){
        return view('pages.catalog');
    }

    public function getCategory(){
        return view('pages.category');
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getDetails(){
        return view('pages.details');
    }

}
