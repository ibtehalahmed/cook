<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'locations';
      protected $fillable = [];
      protected $hidden = [];
      public function user(){
      	return $this->belongsTo('App/user');
      }
}
