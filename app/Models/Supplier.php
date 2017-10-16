<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
    	'sup_name','sup_phone','sup_address','sup_email','sup_image','status','sup_account'
    ];

    
}
