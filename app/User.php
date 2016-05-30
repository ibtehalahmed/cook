<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 'email', 'password','phone','address','usertype'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



      public function location(){
<<<<<<< HEAD
        return $this->belongsTo('App/Location');
=======
        return $this->belongsTo('App/location');
>>>>>>> 19bfd441e8fc1c948eac2dbb4e142b8ef5462a90
      }

       public function specificOrder(){
        return $this->hasMany('App/SpecificOrder');
      }
<<<<<<< HEAD
      public function meal(){
        return $this->hasMany('App/Meal','id');
      }
=======
      public function meals(){
        return $this->hasMany('App/Meal');
      
>>>>>>> 19bfd441e8fc1c948eac2dbb4e142b8ef5462a90
}
}
