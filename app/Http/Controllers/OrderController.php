<?php
use App\User;
use App\Meal;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order ;
use Response;



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
      
      if($request->usertype === 0 ){
        //return "user is customer";
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
                    'message' => 'انت طباخ لا يمكنك طلب وجبة '
                ]
            ], 422);}
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $order = Order::find($id);
 
        if(!$order){
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
        ], 200);
    
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
   
    }
