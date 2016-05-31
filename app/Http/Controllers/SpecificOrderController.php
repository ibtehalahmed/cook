<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Response;
class SpecificOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
         
            
            //$table->float('price');
            //$table->float('time');
           
           
        return \App\SpecificOrder::create([
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'description' => $data['description']
        ]);
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
        //
          $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'quantity' => 'required|max:255',
            'description' => 'required',
            
        ]);
        
        if ($validator->fails()){
               // var_dump($validator->$errors()->all());
             //return response('make sure that your data is correct',403);  
             return response($validator->errors()->all(),403);

            }
        $order = \App\SpecificOrder::create($request->all());
        return Response::json
        ([
           'message' => 'Order Created Succesfully'
                
        ]);

        
        
        
        /////////////////////////////////////////////////
        /*
         if(! $request->name or ! $request->quantity){
            return Response::json([
                'error' => [
                    'message' => 'Please Provide Both name and quantity'
                ]
            ], 422);
        }
        $order = \App\SpecificOrder::create($request->all());
 
        return Response::json([
                'message' => 'Order Created Succesfully'
                
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
