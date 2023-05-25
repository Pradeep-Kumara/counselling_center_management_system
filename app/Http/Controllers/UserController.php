<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::whereIn('user_role_iduser_role',[2,3])->get(); //Get users where User Roles are 2 and 3

        return view('user_management.userManagement',['title'=>'User Management', 'users'=>$users]);
    }



//Save User Start
    public function saveUser(Request $request){


        $validator = \Validator::make($request->all(), [

            'userType' => 'required',
            'fName' => 'required|max:115',
            'lName' => 'required|max:115',
            'contactNo' => 'required|max:10|min:10',
            'gender' => 'required',
            'dob' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',

        ], [

            'userType.required' => 'User Type should be provided!',

            'fName.required' => 'First Name should be provided!',
            'fName.max' => 'First Name must be less than 115 characters.',

            'lName.required' => 'Last Name should be provided!',
            'lName.max' => 'Last Name must be less than 115 characters.',

            'contactNo.required' => 'Contact No should be provided!',
            'contactNo.max' => 'Contact No must be include 10 numbers.',
            'contactNo.min' => 'Contact No must be include 10 numbers.',

            'gender.required' => 'Gender should be provided!',

            'dob.required' => 'DOB should be provided!',

            'username.required' => 'Email should be provided!',

            'password.required' => 'Password should be provided.',
            'password.min' => 'Password must be include minimum 6 characters.',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }


        $advanceEncryption = (new  \App\MyResources\AdvanceEncryption($request['password'],"Nova6566", 256));

        $saveUser = new User();

        $saveUser->first_name = strtoupper($request['fName']);
        $saveUser->last_name = strtoupper($request['lName']);
        $saveUser->contact_number = $request['contactNo'];
        $saveUser->gender = $request['gender'];
        $saveUser->dob = $request['dob'];
        $saveUser->user_name=strtolower($request['username']);
        $saveUser->password = $advanceEncryption->encrypt();
        $saveUser->status = 1;
        $saveUser->user_role_iduser_role = $request['userType'];

        $saveUser->address = $request['address'];

        $saveUser->save();


        return response()->json(['success' => 'User Saved Successfully.']);

    }
    //Save User End






    //Update User Start
    public function updateUser(Request $request){

        $hiddenUserId = $request['hiddenUserId'];

        $firstName = $request['firstName'];
        $lastName = $request['lastName'];
        $contactNo = $request['contactNo'];
        $dob = $request['dob'];



        //Validation
        $validator = \Validator::make($request->all(), [

            'firstName' => 'required|max:115',
            'lastName' => 'required|max:115',
            'contactNo' => 'required|max:10|min:10',
            'dob' => 'required',

        ], [
            'firstName.required' => 'First Name should be provided!',
            'firstName.max' => 'First Name must be less than 115 characters.',

            'lastName.required' => 'Last Name should be provided!',
            'lastName.max' => 'Last Name must be less than 115 characters.',

            'contactNo.required' => 'Contact No should be provided!',
            'contactNo.max' => 'Contact No must be include 10 numbers.',
            'contactNo.min' => 'Contact No must be include 10 numbers.',

            'dob.required' => 'DOB should be provided!',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }



        $update = User::find($hiddenUserId);

        $update->first_name=strtoupper($firstName);
        $update->last_name=strtoupper($lastName);
        $update->contact_number=$contactNo;
        $update->dob=$dob;

        $update->save();

        return response()->json(['success'=>'User Updated']);
    }
//Update User End










 //when selecting a value of selectBox box loads another value set in another selectBox box
    /*public function categorySelectBox(Request $request){
        //Log::debug($request); //can view output log from the file storage->logs->laravel.log
        //dd($request);

        if($request['type']==2){
            $categories=Category::where('status',1)->get();

            //This is how to insert HTML codes in PHP
            $table=''; //Declare a variable
            $table.="<select  class='form-control' name='category' id='category' required>"; //append to that variable
            foreach ($categories as $category){
                $table.="<option>$category->category_name</option>";
            }
            $table.="</select>";

            return $table; //return selectBox to front-end
        }
    }*/




}