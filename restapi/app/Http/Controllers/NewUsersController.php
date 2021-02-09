<?php

namespace App\Http\Controllers;

use App\NewUsers;
use Illuminate\Http\Request;

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
