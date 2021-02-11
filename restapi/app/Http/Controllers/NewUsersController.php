<?php

namespace App\Http\Controllers;

use App\NewUsers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ResetPasswordMail;

class NewUsersController extends Controller
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

    public function resetPasswrod(Request $request)
    {
        $request->validate(['email'=>'required']);
        $user = NewUsers::where('email',$request->email)->first();
        $otp = rand(111111,999999);
        $user->otp = $otp;
        $user->update();
        try{
            Mail::to($request->email)->send(new ResetPasswordMail($otp));
            $response=$user;
            return response($response,201);
        }catch(Exception $eror){
            dd($error);
        }
        

    }

    public function postReset(Request $request)
    {
       $request->validate([
           'otp'=>'required',
           'password'=>'required',
           'email'=>'required'
       ]);

       $user = NewUsers::where('email',$request->email)->first();
       if($user->otp == $request->otp){
           $user->password = hash('sha256',$request->password);
       $data = $user->update();
       }
       else{
           $data = false;
       }
       
       if($data){
           return response($user,200);
       }else{
        return response()->json(['fault'=>'Something went wrong. Try again later'],500);
       }



       

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
        $request->validate([
            'user_name'=>'required',
            'email'=>'required|unique:new_users',
            'password'=>'required'
            
        ]);
        $taskAdd = NewUsers::create([
            'user_name'=>$request->user_name,
            'email'=>$request->email,
            'password'=>hash('sha256', $request->password)
        ]);
        if ($taskAdd){
            $response = ['user'=>$taskAdd];
            return response($response,201);
        }else{
            return response()->json(['fault'=>'Something went wrong. Try again later'],500);
        }
    }

    public  function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user = NewUsers::where('email',$request->email)->get();
        if(count($user)>0){
            $usert = NewUsers::where('email',$request->email)->first();
            if($usert->password == hash('sha256', $request->password)){
                $response = ['user'=>$usert];
                return response($response,201);
            }else{
                return response()->json(['fault'=>'Wrong credential'],500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewUsers  $newUsers
     * @return \Illuminate\Http\Response
     */
    public function show(NewUsers $newUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewUsers  $newUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(NewUsers $newUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewUsers  $newUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required|unique:new_users',
            'password'=>'required',
            'user_name'=>'required'
        ]);
        $t = NewUsers::find($id);
        $t->user_name = $request->user_name;
        if($t->email != $request->email){
            $t->email=$request->email;
        }
        
        $t->password=hash('sha256', $request->password);
        $t->update();
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'password'=>'required',
            'user_name'=>'required'
        ]);
        $t = NewUsers::find($id);
        $t->user_name = $request->user_name;
        if($t->email != $request->email){
            $t->email=$request->email;
        }
        
        $t->password=hash('sha256', $request->password);
        $t->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewUsers  $newUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = NewUsers::destroy($id);
    }
}


