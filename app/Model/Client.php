<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'bod', 'phone', 'password', 'blood_type_id', 'city_id');

    public function posts()
    {
        return $this->morphedByMany('App\Model\Post', 'clientable');
    }

    public function BloodTypes()
    {
        return $this->morphedByMany('App\Model\BloodType', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Model\Notification', 'clientable');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id');
    }

       public function BloodType()
    {
        return $this->belongsTo('App\Model\BloodType', 'Blood_type_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }
    public function tokens()
    {
        return $this->hasMany('App\Model\Token');
    }
    public function governments()
    {
        return $this->morphedByMany('App\Model\Government','clientable');
    }

    protected $hidden = [

        'password','api_token'

    ];
}