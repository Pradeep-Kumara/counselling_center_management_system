<?php


namespace App\Http\Controllers;


use App\Payment;

class PaymentLogController extends Controller
{

    public function index(){

        $payments = Payment::get();


        return view('payment.paymentLog',['title'=>'Payment Log', 'payments'=>$payments]);
    }


}