<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuanceDetail extends Model
{
    protected $fillable = [

    	'issuance_master_id','item_id','issued_qnt'
    ];

    public function issuanceMasters()
    {
    	return $this->belongsTo(IssuanceMaster::class);
    }

    public function items()
    {
    	return $this->belongsTo('App\Models\Item','item_id');
    }


}
