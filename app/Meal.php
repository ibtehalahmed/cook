<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    
     protected $fillable=['id','name','price' ];
   
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
public function users()
    {
        return $this->belongsTo('App\User' );
    }    

    public function meals()
    {
        return $this->belongsTo('App\Category');
    }    
}
