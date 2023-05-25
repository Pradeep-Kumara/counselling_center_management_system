<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table='time_slot';
    protected $primaryKey='idtime_slot';


    public function Appointment(){

        return $this->hasMany(Appointment::class,'time_slot_idtime_slot');
    }

}