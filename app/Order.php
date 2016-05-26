<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable=['meal_id','user_id','quantity'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
    
    
    }
