<?php


namespace App\Http\Controllers;


use App\Client;
use Illuminate\Http\Request;
class ClientReportController extends Controller

{

    public function clientReportIndex(Request $request){


        $clients=Client::query();

        $fromDate=$request['startDate'];
        $endDate=$request['endDate'];

        if($fromDate){

            $clients=$clients->whereDate('created_at','>=',date('Y-m-d',strtotime($fromDate)));
        }


        if($endDate){
            $clients=$clients->whereDate('created_at','<=',date('Y-m-d',strtotime($endDate)));
        }


        $clients=$clients->get();

        return view('reports.clientReport',['title'=>'Client Report - Global Minds (PVT) Ltd','clients'=>$clients]);
    }


}