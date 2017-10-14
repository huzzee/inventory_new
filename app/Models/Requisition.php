<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
   protected $fillable = [
   		'issued','approved','reason','department_id','user_id','rejected'
   ];

   public function users()
   {
   		return $this->belongsTo('App\User','user_id'); 
   }

   public function departments()
   {
   		return $this->belongsTo('App\Models\Department','department_id'); 
   }

   public function requistionDetails()
   {
         return $this->hasMany('App\Models\RequisitionDetail','id');
   }
}
