<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table='payment';
    protected $primaryKey='idpayment';



    public function Appointment(){

        return $this->belongsTo(Appointment::class,'appointment_idappointment');
    }


}