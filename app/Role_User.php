<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    protected $table='role_user'; 
    protected $fillable = ['id_r','role_id','user_email','created_at','updated_at'];
}
