<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table='user_role';
    protected $primaryKey='iduser_role';



    public function User(){

        return $this->hasMany(User::class,'user_role_iduser_role');
    }


}