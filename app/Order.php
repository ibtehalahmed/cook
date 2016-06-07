<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    public $timestamps = false;
    protected $table='orders'; 

    protected $fillable=['user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function meals_orders()
    {
       return $this->hasMany('App\MealOrder');
    }
    
 }
