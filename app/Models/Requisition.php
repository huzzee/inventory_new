<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
   protected $fillable = [
   		'issued','approved','reason','department_id','user_id','rejected','approval_date','approval_by','req_code'
   ];

   public function users()
   {
   		return $this->belongsTo('App\User','user_id'); 
   }

   public function departments()
   {
   		return $this->belongsTo('App\Models\MyDepartment','department_id'); 
   }

   public function requisitionDetails()
   {
         return $this->hasMany(RequisitionDetail::class);
   }

   public function purchaseOrderMasters()
   {
         return $this->hasMany('App\Models\PurchaseOrderMasters','id');
   }

   public function issuance_masters()
   { 
      return $this->hasMany('App\Models\IssuanceMaster','id');
   }
}
