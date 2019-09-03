<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;

    public function clients()
    {
        return $this->morphToMany('App\Model\Client', 'clientable');
    }


        public function client()
    {
        return $this->hasMany('App\Model\Client');
    }

        public function government()
    {
        return $this->hasMany('App\Model\Government');
    }
          public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

}