<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    protected $fillable = [
    	'purchase_order_master_id','item_id','order_qnt','item_rate','total_amount'
    ];

    

    public function items()
    {
    	return $this->belongsTo('App\Models\Item','item_id');
    }

    public function purchaseOrderMasters()
    {
        return $this->belongsTo(PurchaseOrderMaster::class);
    }
}
