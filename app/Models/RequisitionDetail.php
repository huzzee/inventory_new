<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitionDetail extends Model
{
    protected $fillable = [
    	'requisition_id','item_id','required_qnt'
    ];

    public function requisitions()
    {
    	return $this->belongsTo(Requisition::class);
    }

    public function items()
    {
    	return $this->belongsTo('App\Models\Item','item_id');
    }
}
