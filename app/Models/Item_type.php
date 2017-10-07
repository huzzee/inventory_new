<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_type extends Model
{
    protected $fillable = [
    	'item_type_name','status'
    ];


    public function item_categories()
    {
    	$this->hasMany('App\Models\Item_category','item_type_id');
    }
}
