<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitionDetail extends Model
{
    protected $fillable = [
    	'requisition_id','item_name','required_qnt'
    ];

    public function requisitions()
    {
    	return $this->belongsTo(Requisition::class);
    }
}
