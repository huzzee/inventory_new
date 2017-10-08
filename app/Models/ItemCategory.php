<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $fillable = [
    	'item_type_id','item_cat_name','status'
    ];

    public function items(){
    	$this->hasMany('App\Models\Item');
    }
}
