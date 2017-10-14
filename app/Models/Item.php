<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'item_name','description','catagory_id','type_id','item_unit','opening_qnt','current_qnt','min_qnt','item_image',
    	'unit_price','discount_price','discount_percent','is_saleable','sort_order','status','item_code'
    ];

    public function item_categories()
    {

    	return $this->belongsTo('App\Models\ItemCategory','catagory_id');
    }

    public function item_types()
    {
    	return $this->belongsTo('App\Models\ItemType','type_id');
    }

    
}
