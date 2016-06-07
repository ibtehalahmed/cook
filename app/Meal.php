<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table='meals'; 
    protected $fillable=['id','name','price' , 'quantity' , 'description','category_id', 'time','user_id'];
   

public function users()
    {
        return $this->belongsTo('App\User' );
    }    
   

    public function category()
    {
        return $this->belongsTo('App\Category');
    }  
    public function meals_orders()
    {
        return $this->hasMany('App\MealOrder');
    }  
}
