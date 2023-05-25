<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table='appointment';
    protected $primaryKey='idappointment';


    public function Category(){
        //One Appointment belongsTo one Category
        return $this->belongsTo(Category::class,'category_idcategory');
    }


    public function User(){

        return $this->belongsTo(User::class,'master_user_idmaster_user');
    }


    public function TimeSlot(){

        return $this->belongsTo(TimeSlot::class,'time_slot_idtime_slot');
    }



    public function Payment(){

        return $this->hasOne(Payment::class,'appointment_idappointment');
    }







//To get the counsellor from the relationship between appointment and user tables.
    public function Counsellor(){

        return $this->belongsTo(User::class,'counsellor_id');
    }





}
