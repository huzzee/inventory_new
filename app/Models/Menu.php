<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_name', 'menu_slug','menu_route','parent_menu_id','order','icon','active','hidden','sort_order'
    ];

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission','id');
    }
}
