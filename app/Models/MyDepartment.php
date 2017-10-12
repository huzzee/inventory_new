<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDepartment extends Model
{
    protected $fillable =[
    	'department_name','status'
    ];

    public function users(){
    	return $this->hasMany('App\User','id');
    }
}
