<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\API;

use App\Customer;
use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{


    public function signin(Request $request)
    {
        $this->validate($request, ['username' => 'required|email', 'password' => 'required|min:3']);

        $advanceEncryption=(new  \App\MyResources\AdvanceEncryption($request->get('password'),"Nova6566",256));

        $userData = array(
            'username' => $request->get('username'),
            'password' => $advanceEncryption->encrypt(),
            'status' => '1'
        );

        $user = User::where('username', $request->get('username'))->where('password',$advanceEncryption->encrypt())->exists();
        if ($user==true){
            $userData=User::where('username', $request->get('username'))->where('password',$advanceEncryption->encrypt())->first();
            if ($userData->status==1){
                session(['userid' => $userData->idUser,'username'=>$userData->username,'companyid'=>$userData->Company]);
                Auth::login($userData);
                return redirect('/');
            }else if($userData->status==0){
                return back()->with('warning', 'User has been suspended! Contact your System Administrator.');
            }

        }else{
            return back()->with('error', 'Incorrect login details! Check Username and Password');
        }

    }

    public function logoutNow(Request $request){
//        Auth::logout();
        $request->session()->invalidate();
        return redirect('/signin');
    }


}
