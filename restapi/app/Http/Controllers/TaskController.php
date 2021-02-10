<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\NewUsers;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $users = NewUsers::all();
        return view('tables',['tasks'=>$tasks,'users'=>$users]);
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
            'title'=>'required',
            'started_at'=>'required',
            'end_at'=>'required',
            'user_id'=>'required'
        ]);

        $taskAdd = Task::create([
            'title'=>$request->title,
            'started_at'=>$request->started_at,
            'end_at'=>$request->end_at,
            'user_id'=>$request->user_id,
            'dated'=>$request->dated,
            'description'=>$request->description
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $t = Task::find($request->id);
        $t->title = $request->title;
        $t->started_at=$request->started_at;
        $t->end_at=$request->end_at;
        $t->dated=$request->dated;
        $t->user_id=$request->user_id;
        $t->description= $request->description;
        $t->update();
    }


    public function updateData(Request $request)
    {
        $t = Task::find($request->id);
        $t->title = $request->title;
        $t->started_at=$request->started_at;
        $t->end_at=$request->end_at;
        $t->dated=$request->dated;
        $t->user_id=$request->user_id;
        $t->description= $request->description;
        $t->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Task::destroy($id);
    }
}


