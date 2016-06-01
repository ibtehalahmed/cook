<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
           $meals = DB::table('meals')->get();
       return $meals;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $meal = Meal::create($request->all());
     //    $order = Order::find( $request->id);
       // $order->quantity = $request->quantity;
        //$joke->save();
      
 
       return $meal;
       // var_dump($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $meals = DB::table('meals')->where('id','=',$id)->get();
        return $meals;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function showMealByCategory($id)
    {
         
     $chefs=[];$i=0;
        //all objects of meals
         $meals = DB::table('meals')->where('category_id','=',$id)->get();
         foreach ( $meals as $meal){
                   
                    $chef = DB::table('users')->where('id','=',$meal->user_id)->get();
                    $chefs[$i]=$chef;    
                    $i++;
    }
  $array = array_merge( $meals , $chefs);
return Response::json($array);
   // return  Response::json(array('meals'=> $meals,'chef'=> $chefs ));
                 }
                 
                     
       public function showMealOfUser($id)
    {

         $meals = DB::table('meals')->where('user_id','=',$id)->get();
        
return Response::json($meals);
   // return  Response::json(array('meals'=> $meals,'chef'=> $chefs ));
                 }
                 
                    

    
    }
