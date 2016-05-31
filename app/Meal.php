<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    
     protected $fillable=['id','name','price' ];
   
   // public function orders()
    //{
      //  return $this->hasMany('App\Order');
   // }
public function users()
    {
        return $this->belongsTo('App\User' );
    }    
   

    public function category()
    {
        return $this->belongsTo('App\Category');
    }  
    public function order()
    {
        return $this->hasMany('App\Order', 'order_id');
    }  
}
