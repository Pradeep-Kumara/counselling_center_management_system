<?php


namespace App\Http\Controllers;


class GdfController extends Controller
{
    public function index(){

        return view('counsellor.gdf',['title'=>'General Description Forms']);
    }
}