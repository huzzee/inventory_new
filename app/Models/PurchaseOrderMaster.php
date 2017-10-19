<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderMaster extends Model
{
   protected $fillable = [
    	'requisition_id','user_id','supplier_id','purchase_code','quatation_nmbr','approval_by','approved','rejected','approval_date'
    ];

    public function requisitions()
    {
    	return $this->belongsTo('App\Models\Requisition','requisition_id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User','user_id');
    }


    public function suppliers()
    {
    	return $this->belongsTo('App\Models\Supplier','supplier_id');
    }

    public function grnMasters()
    {
        return $this->hasMany('App\Models\grnMaster','id');
    }
   
    public function purchaseOrderDetails()
    {
    	return $this->hasMany(PurchaseOrderDetail::class);
    }

    
}
