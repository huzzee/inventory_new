<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
    	'role_name','superadmin','status'
    ];

    public function users(){
    	return $this->hasMany('App\User','id');
    }
}
