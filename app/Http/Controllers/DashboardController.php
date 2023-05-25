<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\Client;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function dashboardIndex()
    {


        if(Auth::user()->user_role_iduser_role==4){  //If logged user's user role id is 4 show following

            $userId = User::find(Auth::user()->idmaster_user);

            //Total
            $canceledApp = Appointment::where('status', 2)->where('master_user_idmaster_user', $userId->idmaster_user)->count('idappointment');
            $pendingApp = Appointment::where('status', 0)->where('master_user_idmaster_user', $userId->idmaster_user)->count('idappointment');
            $completedApp = Appointment::where('status', 1)->where('master_user_idmaster_user', $userId->idmaster_user)->count('idappointment');

        }



        else{  //For other users

            //Total
            $canceledApp = Appointment::where('status', 2)->count('idappointment');
            $pendingApp = Appointment::where('status', 0)->count('idappointment');
            $completedApp = Appointment::where('status', 1)->count('idappointment');


            //For getting daily statistics
           /* $canceledApp = Appointment::whereDate('date', Carbon::today())->get()->where('status', 2)->count('idappointment');
            $pendingApp = Appointment::whereDate('date', Carbon::today())->get()->where('status', 0)->count('idappointment');
            $completedApp = Appointment::whereDate('date', Carbon::today())->get()->where('status', 1)->count('idappointment');*/

        }


//New Clients Daily
        $totCustomers = Client::whereDate('created_at', Carbon::today())->get()->count('idclient');




        return view('index', ['title' => 'Dashboard', 'pendingApp' => $pendingApp, 'completedApp' => $completedApp, 'totCustomers' => $totCustomers,  'canceledApp' => $canceledApp]);



    }


}