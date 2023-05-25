<?php


namespace App\Http\Controllers;

use App\Appointment;
use App\Payment;
use App\User;
use App\Category;
use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentLogController extends Controller
{

    public function appointmentLog(){

        $categories=Category::where('status',1)->get();








        $loginUser=Auth::user();

        $appointments=[];

        if($loginUser->user_role_iduser_role==1 || $loginUser->user_role_iduser_role==3){
            $appointments=Appointment::all();
        }

        else if($loginUser->user_role_iduser_role==2){
            $appointments=Appointment::where('counsellor_id',Auth::user()->idmaster_user)->get();
        }

        else if($loginUser->user_role_iduser_role==4){
            $appointments=Appointment::where('master_user_idmaster_user',Auth::user()->idmaster_user)->get();
        }





        $user=User::all();
        $userCounsellors=User::where('user_role_iduser_role',2)->get();
        $timeSlots=TimeSlot::all();

        return view('appointment.appointmentLog',['title'=>'Appointment Log',
            'categories'=>$categories,
            'appointments'=>$appointments,
            'user'=>$user,
            'userCounsellors'=>$userCounsellors,
            'timeSlots'=>$timeSlots,
            ]);

    }

    public function savePayment(request $request){
        $changeStatus=Appointment::find($request['appointmentID']);
        $changeStatus->status=1;
        $changeStatus->save();

        $savepayment=new Payment();
        $savepayment->appointment_idappointment=$request['appointmentID'];
        $savepayment->amount=$changeStatus->amount;
        $savepayment->save();

        return response()->json(['success'=>'payment saved']);

    }


    public function cancelAppointment(request $request)
    {
        $cancelAppointment=Appointment::find($request['aptId']);
        $cancelAppointment->status=2;
        $cancelAppointment->save();

        return response()->json(['success'=>'APPOINTMENT CANCELED']);
    }

}