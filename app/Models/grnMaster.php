<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class grnMaster extends Model
{
    protected $fillable = [
        'user_id', 'supplier_id','purchase_order_id','dn_code'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function suppliers()
    {
    	return $this->belongsTo('App\Models\Supplier','supplier_id');
    }

    public function purchaseOrderMaster()
    {
    	return $this->belongsTo('App\Models\purchaseOrderMaster','purchase_order_id');
    }


    public function grnDetails(){

    	return $this->hasMany(grnDetail::class);

    }

}
