<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuanceMaster extends Model
{
    protected $fillable = [
    	'user_id','requisition_id'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User','user_id');
    }


    public function requisitions()
    {
    	return $this->belongsTo('App\Models\Requisition','requisition_id');
    }

    public function issuanceDetails()
    {
    	return $this->hasMany(IssuanceDetail::class);
    }
}
