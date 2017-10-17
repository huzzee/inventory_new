<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class grnDetail extends Model
{
    protected $fillable = [
        'grn_master_id', 'item_id','recieved_qnt','per_unit_rate','total_amount'
    ];

    public function items()
    {
    	return $this->belongsTo('App\Models\Item','item_id');
    }

    public function grnMasters()
    {
    	return $this->belongsTo(grnMaster::class);
    }

}
