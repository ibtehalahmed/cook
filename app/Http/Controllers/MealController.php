<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meal;
use App\Http\Requests;
use DB;
use Response;
class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $meals = DB::table('meals')->get();
        return $meals;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

       $meal = Meal::create($request->all());

       return $meal;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $meals = DB::table('meals')
            ->select('meals.id','meals.name','meals.description','meals.quantity','meals.price','users.name as user_name','users.id as user_id')
            ->join('users', 'meals.user_id', '=', 'users.id')
                ->get();
        return $meals;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }


     public function showMealByCategory($id)
    {
         
     $chefs=[];$i=0;
        //all objects of meals
         $meals = DB::table('meals')->where('category_id','=',$id)->get();
  
         $array = Array( $meals);
         return Response::json($array);
         }
                 
                     
       public function showMealOfUser($id)
        {
             $meals = DB::table('meals')->where('user_id','=',$id)->get();
        
            return Response::json($meals);
        }
                 
           

}
