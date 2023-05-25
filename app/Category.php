<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $primaryKey='idcategory';


    public function Appointment(){

        //One Category hasMany Appointments
        return $this->hasMany(Appointment::class,'category_idcategory');
    }

}
