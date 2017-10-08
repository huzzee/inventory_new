<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $fillable = [
    	'item_type_name','status'
    ];


    public function items(){
    	$this->hasMany('App\Models\Item');
    }

   
}
