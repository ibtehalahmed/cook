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
    return view('welcome');
});
//Route::controller('/orders','OrderController@index') ;
//Route::get('/orders', ['uses' => 'OrderController@index']);


Route::group(['prefix' => 'api/'], function(){ 
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'Usercontroller'); 
    Route::post('auth','Usercontroller@checkAuth');
    Route::post('register','Usercontroller@store');
    Route::resource('location', 'LocationController');
    Route::resource('specificorder', 'SpecificOrderController');
    Route::resource('orders', 'OrderController');
    Route::get('orders/calculate/{id}', 'OrderController@calculate');
    Route::get('meals/{c_id}', 'MealController@showMealByCategory');
    Route::get('meals/u/{c_id}', 'MealController@showMealOfUser');
    Route::resource('meal', 'MealController');
    Route::post('user/addmeal', 'Usercontroller@addNewMeal');
   });


