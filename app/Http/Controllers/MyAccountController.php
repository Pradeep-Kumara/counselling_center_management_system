<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index(){
       // $clients = Client::where('master_user_idmaster_user', Auth::user()->idmaster_user)->get();

        $users = Auth::user();

        return view('my_account.myAccount', ['title'=>'My Account', 'users' => $users]);
    }



    public function getUserDetails(Request $request){

        return User::find($request['profile']);

    }





    public function updateUserDetails(Request $request) {


        $validator = \Validator::make($request->all(), [

            'fName' => 'required|max:115',
            'lName' => 'required|max:115',
            'dob' => 'required',
            'contactNo' => 'required|min:10|max:10',



        ], [
            'fName.required' => 'First Name should be provided!',
            'fName.max' => 'First Name must be less than 115 characters.',

            'lName.required' => 'Last Name should be provided!',
            'lName.max' => 'Last Name must be less than 115 characters.',


            'contactNo.required' => 'Contact No should be provided!',
            'contactNo.max' => 'Contact No must be at most 10 numbers.',
            'contactNo.min' => 'Contact No must be at least 10 numbers.',


            'dob.required' => 'DOB should be provided!',


        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);

        }




        $updateUser=User::find(Auth::user()->idmaster_user);
        $updateUser->first_name=$request['fName'];
        $updateUser->last_name=$request['lName'];
        $updateUser->dob=$request['dob'];
        $updateUser->contact_number=$request['contactNo'];
        $updateUser->gender=$request['my-input-id'];


        $updateUser->save();

        return response()->json(['success'=>'']);
    }








//Change Password Start

    public function changePassword(Request $request) {


            $validator = \Validator::make($request->all(), [

                'newPassword' => 'required',
                'confirmPassword' => 'required',

            ], [

                'newPassword.required' => 'New Password should be provided!',

                'confirmPassword.required' => 'Confirm Password should be provided!',


            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }


            $advanceEncryption=(new  \App\MyResources\AdvanceEncryption($request->get('newPassword'),"Nova6566",256));

        $changePassword=User::find(Auth::user()->idmaster_user);
        $changePassword->password= $advanceEncryption->encrypt();

        $changePassword->save();

            return response()->json(['success'=>'Saved']);


    }
//Change Password End



}