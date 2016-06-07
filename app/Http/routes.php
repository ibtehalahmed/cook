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

    Route::post('auth',"UserController@checkAuth");
    Route::post('register','UserController@store');
    Route::get('chefs/{loc_id}','UserController@find_chefs_by_location');
    Route::resource('user', 'UserController'); 
    Route::get('logout','UserController@logout');
    Route::resource('location','LocationController');
    Route::resource('order','OrderController');

    Route::resource('category', 'CategoryController');
    Route::resource('specificorder', 'SpecificOrderController');
    //Route::resource('orders', 'OrderController');
    //Route::get('orders/calculate/{id}', 'OrderController@calculate');
    Route::get('meals/{c_id}', 'MealController@showMealByCategory');
    Route::get('meals/u/{c_id}', 'MealController@showMealOfUser');
    Route::resource('meal', 'MealController');
    Route::post('user/addmeal', 'UserController@addNewMeal');


   });



