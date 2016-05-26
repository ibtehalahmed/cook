<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificOrder extends Model
{
    //
      protected $table = 'specific_orders';
      protected $fillable = [];
      protected $hidden = [];
      public function user(){
      	return $this->belongsTo('App/User');
      }
}
