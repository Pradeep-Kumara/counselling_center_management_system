<?php


namespace App\Http\Controllers;


class FeedbackController extends Controller
{

    public function index(){

        return view('feedback.feedback',['title'=>'Feedback']);
    }



}