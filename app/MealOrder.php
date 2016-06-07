<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    //
        protected $table='meals_orders'; 
        
        protected $fillable=['meal_id' ,'order_id','quantity' ,'comment','comment_date','rate' ];
    
        public function meal()
        {
            return $this->belongTo('App\Meal');
        }
        public function order()
        {
            return $this->belongTo('App\Order');
        }

}
