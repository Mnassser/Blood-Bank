<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'about_app', 'fb_link', 'tw_link');

}