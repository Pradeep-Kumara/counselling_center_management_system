<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use View;

class FonikController extends Controller
{

    public function showView($name)
    {
        if(View::exists($name)){
            return view($name);
        }
        else{
            return view('pages-404');
        }
    }
}