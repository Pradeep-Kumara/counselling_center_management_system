<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueReportController extends Controller


{
    public function revReportIndex(Request $request)
    {

        $startDate = $request['startDate'];
        $endDate = $request['endDate'];


        $query = Appointment::query();

        if (!empty($startDate) && !empty($endDate)) {

            $startDate = date('Y-m-d', strtotime($request['startDate']));
            $endDate = date('Y-m-d', strtotime($request['endDate']));

            $query = $query->whereBetween('date', [$startDate, $endDate]); //filter from date
        }


        $appointments = $query->where('status', 1)->get();


        $total = $query->where('status', 1)->sum('amount'); //Sum of Amounts


        return view('\reports.revenueReport', ['title' => 'Revenue Report - Global Minds (PVT) Ltd', 'appointments' => $appointments, 'total' => $total]);


    }


}
