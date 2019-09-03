<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'order_id');

    public function clients()
    {
        return $this->morphToMany('App\Model\Client', 'clientable');
    }
    public function order()
    {
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

}