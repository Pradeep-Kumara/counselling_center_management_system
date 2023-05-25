<?php
/**
 * Created by PhpStorm.
 * User: Nimesh VGS
 * Date: 12/17/2019
 * Time: 3:25 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\MasterCompany;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


   public function add_user(){

        $masterCompanies=MasterCompany::all();
        $userRoles=UserRole::where('status','1')->get();
       return view('user.add_user',['masterCompanies'=>$masterCompanies,'title'=>'Add User','userRoles'=>$userRoles]);
   }

    public function createUser(Request $request)
    {

        $title = $request->get('title');
        $fName = $request->get('fName');
        $lName = $request->get('lName');
        $gender = $request->get('gender');
        $contactNo = $request->get('contactNo');
        $utype = $request->get('utype');
        $username = $request->get('username');
        $pass2 = $request->get('pass2');
        $company = $request->get('company');

        $rules=[
            'title' => 'required',
            'fName' => 'required',
            'lName' => 'required',
            'contactNo' => 'required',
            'utype' => 'required',
            'username' => 'required|email',
            'pass2' => 'required|min:8',
            'company'=>'required'


        ];


        $userMsg=[
            'company.required'=>'Company should be provided!',
            'uTitle.required' => 'This value should be provided!',
            'fName.required' => 'This value should be provided!',
            'lName.required' => 'This value should be provided!',
            'contactNo.required' => 'This value should be provided!',
            'utype.required' => 'This value should be provided!',
            'username.required' => 'Username should be provided!',
            'pass2.min' => 'The Password must be at least 8 characters.',

        ];





        $this->validate($request, $rules, $userMsg);
        $name = "";
        if ($request->hasfile('proImage')) {
            $file = $request->file('proImage');
            $name =  time().$file->getClientOriginalName();
            $file->move(public_path('assets/images/users/'), $name);
        }

        $userNameExist=User::where('username',$username)->get();

//        if($userNameExist==null){
            $user = new User();
            $user->title = $title;

            $user->fName = strtoupper($fName);
            $user->Lname = strtoupper($lName);
            $user->gender = $gender;
            $user->Company = $company;
            $user->contactNo = $contactNo;
            $user->Meta_User_Role = intval($utype);
            $user->username = $username;


            $advanceEncryption = (new  \App\MyResources\AdvanceEncryption($pass2, "Nova6566", 256));

            $user->password = $advanceEncryption->encrypt();
            $user->image = $name;
            $user->status = 1;
            $user->save();

            return redirect()->route('add_user')->with('success', 'User Information has been added');
//        }else{
//            return response()->json(['errors' => ['a' => 'User Name already in database!']]);
//        }

//
//        return redirect()->route('/add-user');
    }

    public function view_users(){

       $viewUsers=User::all();
        $masterCompanies=MasterCompany::all();
        $userRoles=UserRole::where('status','1')->get();

       return view('user.view_users',['viewUsers'=>$viewUsers,'title'=>'View User','masterCompanies'=>$masterCompanies,'userRoles'=>$userRoles]);
    }

    public function userById(Request $request){

        $uUserId=$request['uUserId'];
        $getUserById=User::find(intval($uUserId));

//        return compact($getUserById, 'json');

        return response()->json($getUserById);
    }




    public function updateUser(Request $request){


        $hiddenUserId=$request['hiddenUserId'];
        $uTitle=$request['uTitle'];
        $uFName=$request['uFName'];
        $uLName=$request['uLName'];
        $uGender=$request['uGender'];
        $uContactNo=$request['uContactNo'];
        $uUsername=$request['uUsername'];
        $company=$request['company'];
        $uType=$request['uType'];

        $rules = \Validator::make($request->all(), [

            'uTitle' => 'required',
            'uFName' => 'required',
            'uLName' => 'required',

            'uContactNo' => 'required',
            'uUsername' => 'required',

        ], [
            'uTitle.required' => 'Title should be provided!',
            'uFName.required' => 'First name should be provided!',
            'uLName.required' => 'First name should be provided!',
            'uContactNo.required' => 'Contact No should be provided!',
            'uUsername.required' => 'User Name should be provided!',
        ]);
        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()->all()]);
        }




        $userUpdate=User::find(intval($hiddenUserId));
        $userUpdate->title=$uTitle;
        $userUpdate->fName=$uFName;
        $userUpdate->lName=$uLName;
        $userUpdate->gender=$uGender;
        $userUpdate->contactNo=$uContactNo;
        $userUpdate->username=$uUsername;
        $userUpdate->Company=$company;
        $userUpdate->Meta_User_Role=$uType;
        $userUpdate->update();




        return response()->json(['success' => 'User Information updated successfully']);

    }

    public function updateUserImage(Request $request){

        $hiddenUID=$request['hiddenUID'];
        $file= $request->file('updatedImage');

        if($file != null) {
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path('assets/images/users/'), $name);

            $itemImageSave=User::find($hiddenUID);
            $itemImageSave->image = $name;
            $itemImageSave->update();

        }
        return response()->json([ 'success' => 'success','hiddenUID'=>$hiddenUID,'name'=>$name]);
    }

    public function getViewUserPassById(Request $request)
    {
        $pid = $request['pid'];
        $findUserPwrd = User::find(intval($pid));
        return response()->json($findUserPwrd);
    }

    public function updatePassword(Request $request)
    {
        $update_pass2 = $request['update_pass2'];
        $hiddenPID = $request['hiddenPID'];
        $compass = $request['compass'];

        $validator = \Validator::make($request->all(), [
            'update_pass2' => 'required',
            'compass' => 'required',

        ], [
            'update_pass2.required' => 'Password should be provided!',
            'compass.required' => 'Conform Password should be provided!',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if ($compass != $update_pass2) {
            return response()->json(['errors' => ['error'=>'Password not match.']]);
        }

        $advanceEncryption = (new  \App\MyResources\AdvanceEncryption($update_pass2, "Nova6566", 256));

        $pass = User::find(intval($hiddenPID));
        $pass->password = $advanceEncryption->encrypt();
        $pass->save();

        return response()->json(['success' => 'User Password is successfully updated']);

    }



}