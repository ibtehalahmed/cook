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
//TgHW9D3!h
//cookteam
use Illuminate\Database\Eloquent\Model\Category;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'api/'], function(){ 
    Route::post('register','UserController@store');
    Route::post('search','UserController@search');

    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController'); 
    Route::resource('location','LocationController');
    Route::get('logout','UserController@logout');
    Route::post('auth','UserController@checkAuth');


    Route::resource('specificorder', 'SpecificOrderController');
    Route::resource('orders', 'OrderController');
    Route::get('orders/calculate/{id}', 'OrderController@calculate');
    Route::get('meals/{c_id}', 'MealController@showMealByCategory');
      Route::resource('meal', 'MealController');
   });



