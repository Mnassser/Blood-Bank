<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Government extends Model 
{

    protected $table = 'governments';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\Model\City');
    }


    public function clients()
    {
        return $this->morphToMany('App\Model\Client', 'clientable');
    }


    
        public function bloodtypes()
    {
        return $this->hasMany('App\Model\BloodType');
    }

}