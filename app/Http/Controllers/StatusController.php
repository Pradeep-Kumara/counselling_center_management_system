<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;

use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activateDeactivate(Request $request)
    {

        $id = $request['id'];
        $table = $request['table'];



        if ($table == "category") {

            $table = Category::find($id);
            if ($table->status == 1) {
                $table->status = 0;
            }

            else {
                $table->status = 1;
            }
            $table->update();
        }





        if ($table == "master_user") {

            $table = User::find($id);
            if ($table->status == 1) {
                $table->status = 0;
            }

            else {
                $table->status = 1;
            }
            $table->update();
        }












    }
}
