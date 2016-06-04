<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Role;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;
use DB;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      
    }
      public function checkAuth(Request $request){

              $credentials = [
                  'email' => $request->input('email'),
                  'password' => $request ->input('password')
              ];


              if ((! Auth ::attempt($credentials))){
                return response('make sure that the email and password match',403);  
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
            'usertype' => 'required',
            'location' => 'required'
        ]);

            if ($validator->fails()){
                return response($validator->errors()->all(),403);

            }

        $location_term = $request->input('location');
        $location = DB::table('locations')
                                          ->where('name', '=', $location_term)
                                          ->first();

        $array= User::create(array(
        'name' => $request->input('name'),
        'email'    => $request->input('email'),
        'password' => Hash::make($request->input(('password'))),
        'phone'    => $request->input('phone'),
        'address'  => $request->input('address'),
        'usertype' => $request->input('usertype'),
        'location_id' => $location->id,     
    ));
        $credentials = [
                  'email' => $request->input('email'),
                  'password' => $request ->input('password')
              ];
            ///$user = DB::table('users')->where('email', '=', $email)->get();

            if (! Auth ::attempt($credentials)){
                return response('cannot register',403);  
              }

                return response(Auth::User(),201);
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = DB::table('users')->where('id', '=', $id)->get();
        return $profile;
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
    public function logout(){
      if (! Auth::User()){
       return response('you are not logged in');

      }
      else{
      return response('you are signed out');
    }
    }
    public function find_chefs_by_location($location_id){
  
        $chefs = DB::table('users')->where('location_id', '=', $location_id)
                                   ->where('usertype',1)
                                   ->get();
    
        return $chefs;
    }
    
      }
    


    
    
    

