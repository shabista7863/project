<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Session;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      // echo 22;
       $user = array('name'=>'sabsta','age'=>22);
       return response()->json(['status'=>true,'code'=>200,'data'=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $data = array('name'=>$name, 'email'=>$email, 'phone'=>$phone, 'password'=>$password);
        $Table = DB::table('user')->insert($data);
       //dd($Table);
        return response()->json(['status'=>true,'code'=>200,'data'=>'data successfull inserted']);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()  
    {
        $store =DB::table('user')->select ('name','email')->paginate(2);
       return response()->json(['status'=>true,'code'=>200,'data'=>$store]); 
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

    public function update(Request $request)
    {
        $updated = DB::table('user')
        ->where('id',$request->id)
        ->update(['name'=>$request->name,'email'=>$request->email,
        'phone'=>$request->phone,'password'=>$request->password
        ]);

        return response()->json(['status'=>true,'code'=>200,'data'=>'updated success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $dest = DB::table('user')->delete($request->id);
       return response()->json(['status'=>true, 'code'=>200, 'data'=>'deleted success']);
    }
}
