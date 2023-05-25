<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\User;
use App\Category;
use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index(){


        $categories=Category::where('status',1)->get();



        //Only showing appointments of logged in client and showing all appointments for other roles in makeAppointment.
        if(Auth::user()->user_role_iduser_role==4){
            $appointments=Appointment::where('master_user_idmaster_user',Auth::user()->idmaster_user)->get();
        }else{
            $appointments=Appointment::all();
        }



        $user=User::all();
        $userLogged=Auth::user();
        $userCounsellors=User::where('user_role_iduser_role',2)->get();
        $userClients=User::where('user_role_iduser_role',4)->get();
        $timeSlots=TimeSlot::all();


        $maxDays = Carbon::now()->addDays(13); //max 7 days starting from today





        return view('appointment.makeAppointment',['title'=>'Appointment',
            'categories'=>$categories,
            'appointments'=>$appointments,
            'user'=>$user,
            'userClients'=>$userClients,
            'userCounsellors'=>$userCounsellors,
            'timeSlots'=>$timeSlots,

            'userLogged'=>$userLogged,
            'maxDays'=>$maxDays,


            ]); /*Appointment view eka return karaddi Category model eka haraha
                                category table eke records tikath pass krnva category ekak
                                select krnna puluwan wenna appointment eke and UI eke table eke
                                category table eke details pennanna */
    }





    public function saveAppointment(Request $request){

        $client= $request['client'];
        $category = $request['category'];
        $date = $request['date'];
        $timeSlot = $request['timeSlot'];
        $counsellor = $request['counsellor'];



        //Validation Start
        $validator = \Validator::make($request->all(), [


            'category'  =>   'required',
            'client'  =>   'required',
            'date'  =>   'required',
            'timeSlot'  =>   'required',
            'counsellor'  =>   'required',


        ], [
            'category.required' =>  'Category should be Selected!',

            'client.required' =>  'Client should be Selected!',

            'date.required' =>  'Date should be Selected!',

            'timeSlot.required' =>  'Time Slot should be Selected!',

            'counsellor.required' =>  'Counsellor should be Selected!',


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

//Validation End




        $amount=Category::find($category)->amount;


        $save=new Appointment();

        $save->date=$date;
        $save->amount=$amount;
        $save->time_slot_idtime_slot=$timeSlot;
        $save->category_idcategory=$category;
        $save->status=0;
        $save->master_user_idmaster_user=$client;
        $save->counsellor_id=$counsellor;

        $save->save();

        return response()->json(['success'=>'Appointment Saved']);

    }














    public function showAmount(Request $request){

        $categoryId = $request['categoryId'];

     return Category::find($categoryId);

    }











public function getTimeSlot(Request $request){


        $counsellorId=$request['counsellor'];
        $date=$request['date'];

        $timeSlotIds=Appointment::whereIn('status',[0,1])->where('counsellor_id',$counsellorId)->where('date',$date)->pluck('time_slot_idtime_slot'); //appointment table eke timeslot Id eka witharak ganna anith attritubes tika natuwa

        $availableTimeSlots=TimeSlot::whereNotIn('idtime_slot',$timeSlotIds)->get();



        $table=''; //Declare a variable
        $table.="<select  class='form-control' name='timeSlot' id='timeSlot' required>"; //append to that variable
        foreach ($availableTimeSlots as $availableTimeSlot){
            $table.="<option value='$availableTimeSlot->idtime_slot'>$availableTimeSlot->time_slot</option>";
        }
        $table.="</select>";


        return $table; //return selectBox to front-end
}




}