<?php //

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

      protected $table = 'categories';
      protected $fillable = ['name'];
      protected $hidden = [];
      public function meal(){
      	return $this->hasMany('App/Meal');
      }
}
