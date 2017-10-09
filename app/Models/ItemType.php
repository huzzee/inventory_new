<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $fillable = [
    	'item_type_name','status'
    ];

    /*public function item_categories(){

    	return $this->hasMany('App\Models\ItemCategory','type_id');
    }*/

    public function items(){

    	return $this->hasMany('App\Models\Item','id');
    }

   
}
