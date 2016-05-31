<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable{
    protected $table='users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','usertype','location_id'

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
        return $this->belongsTo('App/Location');
      }

       public function specificOrder(){
        return $this->hasMany('App/SpecificOrder');
      }


      
       }
