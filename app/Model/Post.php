<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'image','category_id');

    public function clients()
    {
        return $this->morphToMany('App\Model\Client', 'clientable');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }

}