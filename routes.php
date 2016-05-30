<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Database\Eloquent\Model\Category;

Route::get('/', function () {
  return "hello";
});




Route::group(['prefix' => 'api/'], function(){ 
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'Usercontroller'); 
    Route::post('auth','Usercontroller@checkAuth');
    Route::post('register','Usercontroller@store');
    Route::resource('location', 'LocationController');
    Route::resource('specificorder', 'SpecificOrderController');


});


