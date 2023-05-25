<?php


namespace App\Http\Controllers;


class TestController extends Controller
{
        public function testFunction(){


            return view('testView',['title'=>'Test Page']);


        }



}