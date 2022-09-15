<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show ()
    {
        $title = 'welkom op de website';
        return view("Home", compact('title'));
    }
}
