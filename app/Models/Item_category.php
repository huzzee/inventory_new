<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_category extends Model
{
    protected $fillable = [
    	'item-type_id','item_cat_name','status'
    ];

    public function item_types()
    {
    	$this->belongsTo('App\Models\Item_type','id');
    }
}
