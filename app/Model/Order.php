<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'blood_type_id', 'amount', 'hospital_name', 'latitude', 'longitude', 'city_id','client_id');

    public function client()
    {
        return $this->belongsTo('App\Model\Client', 'client_id');
    }
    public function notifications()
    {
        return $this->hasMany('App\Model\Notification');
    }
    public function city(){

    	return $this->belongsTo('App\Model\City', 'city_id');

    }
        public function bloodType(){

        return $this->belongsTo('App\Model\BloodType', 'blood_type_id');

    }

}