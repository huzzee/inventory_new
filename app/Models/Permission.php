<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
    	'user_id','menu_id','status'
    ];

    public function menus()
    {
    	return $this->belongsTo('App\Models\Menu','menu_id');
    }

    public function users()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }

    
}
