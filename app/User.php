<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'username', 'password','first_name','role_id','profile_image','status','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }

    public function my_departments()
    {
        return $this->belongsTo('App\Models\MyDepartment','department_id');
    }

    public function requisitions()
    {
        return $this->hasMany('App\Models\Requisition','id');
    }

    public function purchaseOrderMasters()
    {
        return $this->hasMany('App\Models\PurchaseOrderMasters','id');
    }

    public function issuance_masters()
    {
        return $this->hasMany('App\Models\IssuanceMaster','id');
    }

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission','id');
    }
}
