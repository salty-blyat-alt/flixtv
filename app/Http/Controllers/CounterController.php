<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function show()
    {

        return view('pages.catalog');
    }


}
