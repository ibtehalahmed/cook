<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;


class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function checkAuth(Request $request){
            $val=$this->validate($request, [
            'name' => 'required', 'password' => 'required',
                 ]);
              $credentials = [
                  'name' => $request->input('name'),
                  'password' => $request ->input('password')
              ];
              if ((! Auth ::attempt($credentials))&&( !$val)){
                return response('make sure that the username and password match',403);  
              }
              return response(Auth::User(),201);
                
    }
    
    
    
    
    public function index()
    {
        $users = User::all();
        return $users;

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:6|max:255',
            'phone' => 'required|min:7|max:11|unique:users',
            'address'=>'required|max:255',   
            'usertype' => 'required'
        ]);


            if ($validator->fails()){
               // var_dump($validator->$errors()->all());
             //return response('make sure that your data is correct',403);  
    return response($validator->errors()->all(),403);

            }
            User::create(array(
        'name' => $request->input('name'),
        'email'    => $request->input('email'),
        'password' => Hash::make($request->input(('password'))),
        'phone'    => $request->input('phone'),
        'address'  => $request->input('address'),
        'usertype' => $request->input('usertype'),

        

    ));
            $email=$request->input('email');
                $user = DB::table('users')->where('email', '=', $email)->get();
         return Response($user);
// $user_id=User::select('id')->where('email',$email);
           //return Response::json(User::find($user_id));
            //return response(Auth::User(),201);

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
