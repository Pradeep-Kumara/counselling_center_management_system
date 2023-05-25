<?php


namespace App\Http\Controllers;


class ClientInterfaceController extends controller
{

   public function index() {
        return view('clientInterface',['title'=>'clientInterface']);
    }
}