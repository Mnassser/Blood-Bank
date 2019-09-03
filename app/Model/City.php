<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'government_id');

    public function clients()
    {
        return $this->hasMany('App\Model\Client');
    }
        public function Orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    public function government()
    {
        return $this->belongsTo('App\Model\Government', 'government_id');
    }

}