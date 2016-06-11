<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\MealOrder;
use App\Order;
use App\User;
use App\Meal;
use Response;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
     $orders = Order::all(); //Not a good idea
              return Response::json([
         'data' =>  $orders,
    ], 400);
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
        if(! $request->user_id ){
            return Response::json([
                'error' => [
                    'message' => 'من فضلك قم بتسجيل الدخول لتتمكن من الطلب'
                ]
            ], 422);
        }else{
        $id=$request->user_id ;
        $user =User::find($id);
        $type =$user->usertype;
        $orderMeal=$request->input('order');
         if ($type == 0)
         {
            $order=new Order;
            $order->user_id = $id;
            $order->save();
         
            foreach ( $orderMeal as $singleMeal )
            {
                $meal_order = new MealOrder;
                $meal_order->quantity = $singleMeal['quantity'];
                $meal_order->meal_id =  $singleMeal['id'];
                //add order data through 1 to many relation
                $order->meals_orders()->save($meal_order);
            
            }
            return ($order);

         }
         else{
             return 'cannot enter data';
         }
    
        }
    }  
    /*  if(  $request->user_id  != '' ){
      
                $quan= (int)$request-> input('quantity');
//return $request->get('quantity');      
//return var_dump($quan);
        if(! $quan  or ! $request->user_id or !  $request->meal_id ){
            return Response::json([
                'error' => [
                    'message' => 'من فضلك ادخل الكميه والوجبة'
                ]
            ], 422);
        }
        
        
        $order = Order::create($request->all());
     //    $order = Order::find( $request->id);
       // $order->quantity = $request->quantity;
        //$joke->save();
      
 
       return $this->transform($order);
       // var_dump($order);
    }
    else{return Response::json([
                'error' => [
                    'message' => 'انت لست مسجل بالتطبيق  ليس مسموحالك طلب وجبة '
                ]
            ], 422);}
   */ 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show all orders for specic user with name of meal and the chef and quantity
    public function show($id)
    {
        
    }
      /* //$order = Order::find($id);
 $meal_id = DB::table('orders')->where('user_id','=',$id)->lists('meal_id');
   foreach ( $meal_id as $meal)
{
    $meal_name = DB::table('meals')->where('id','=',$meal)->lists('name');
    //print_r($price);
   // $chef_name=DB::table('users')->where('user_id','=',$id)->lists('meal_id');
//quntity of each mael
    $quan = DB::table('orders')->where('meal_id','=',$meal)->lists('quantity');
     foreach($meal_name as $m => $m_value) {
       foreach($quan as $q => $q_value) {
          print_r($m_value);
          print_r($q_value);
                  }
            //echo("sum = $sum");
     }     
     }*/
     
     

 /*if(!$order){
            return Response::json([
                'error' => [
                    'message' => 'Order does not exist'
                ]
            ], 404);
        }
 
      $previous = Order::where('id', '<', $order->id)->max('id');
 
        // get next joke id
        $next = Order::where('id', '>', $order->id)->min('id');        
        return Response::json([
            'previous_order_id'=> $previous,
            'next_order_id'=> $next,
             'data' => $this->transform($order)
        ], 200); */
    
    
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
       
        if(! $request->is_confirm){
            return Response::json([
                'error' => [
                    'message' => 'Please confirm order'
                ]
            ], 422);
        }
        $order = Order::find($id);
        $order->is_confirm = $request->is_confirm;
        $order->delever_time = $request->time;
        $order->total_price =$request->total_price;
        $order->save();
        $meals=$request->meals;
        for ($i=0;$i<sizeof($meals);$i++){
            $meal_id=$meals[$i]['id'];
            $meal=Meal::find($meal_id);
            $meal->quantity=($meal->quantity)-($meals[$i]['quantity']);
            $meal->save();
        }
               return Response::json([
                'message' => 'تم تأكيد طلبك'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
             /* $order = Order::find($id);
              $order->delete();
              return Response::json([
                'message' => 'تم  إلغاء  طلبك'
        ]);   */
    }
   
    public function update_comment(Request $request){
         $order_id = $request->comment['order_id'];
         $meal_id = $request->comment['meal_id'];
         $Date = $request->comment['date'];
         $text = $request->comment['text'];
         $user = $request->comment['user'];
         $user_id = $user['id'];
         $meal = DB::table('meals_orders')->where('order_id', '=', $order_id)
                                          ->where('meal_id', '=', $meal_id)
                                          ->update(['comment' => $text ,'comment_date' =>$Date]);
//$meal equals to 1 when updated successfully ,and equal to zero when cannot update 
         return $meal;
    }
    
           public function showCommentsOfMeal($id){
          /* $meal=Meal::find($id);
           $comments=$meal->meals_orders;
           
           return Response::json($comments);*/
           $meals = DB::table('meals_orders')
            ->select('meals_orders.id as comment_id','comment','comment_date','user_id','name')
            ->join('orders', 'orders.id', '=', 'meals_orders.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')

            ->get();
           return $meals;
       }  
/*
 * 
private function transformCollection($orders){
    return array_map([$this, 'transform'], $orders->toArray());
}
private function transform($order){
    
    return [
                'رقم الطلب' => $order['id'],
            'الكمية'=>$order['quantity'],
               'العميل' => $order['user']['name'],
        
            'الوجيه'=> $order['meal']['name']
          
            
        ];
    }

    public function calculate($id)
    {
        
    //mealsid for user
        $meal_id = DB::table('orders')->where('user_id','=',$id)->lists('meal_id');
      //  print_r($meal_id);    
//price  of each meal
$total=0;
        foreach ( $meal_id as $meal)
{
    $price = DB::table('meals')->where('id','=',$meal)->lists('price');
    //print_r($price);
    
//quntity of each mael
    $quan = DB::table('orders')->where('meal_id','=',$meal)->lists('quantity');
   // print_r($quan);
     $count=0;
     $sum=0;
    foreach($price as $p => $p_value) {
       // foreach($quan as $q => $q_value) {
           // echo $p_value;
            //echo $quan[$count];
            $product= $p_value * $quan[$count];
            $sum += $product  ;
           $count++;
        }
            //echo("sum = $sum");
            $total += $sum;
    

}   
   //echo($sum);
echo "total =$total";
}
*/

//$quantity=DB::table('orders')->where('meal_id','=',$id)->lists('meal_id');


             /* $order_of_user = Order::find($id);
              $order->delete();
              return Response::json([
                'message' => 'تم  إلغاء  طلبك'
        ]);   */
    }
    
   
    
