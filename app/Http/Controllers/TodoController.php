<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo::orderBy('id','desc')->paginate(5);
        // return $tasks;
        return request()->json(15,$tasks);
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
        $this->validate($request,[
            'name' => 'required|min:3',
        ]);
        // return $request->all();
        $tasks = Todo::create($request->all());
        // $tasks = new Todo();
        // $tasks->name = $request->name;
        // $tasks->save();

        if($tasks){
             $tasks = Todo::orderBy('id','desc')->paginate(5);
            return request()->json(15,$tasks);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        return Todo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //   return $request->all();
        $tasks = Todo::find($request->id);
        // $tasks = new Todo();
        $tasks->name = $request->name;
        $tasks->save();

        if($tasks){
             $tasks = Todo::orderBy('id','desc')->paginate(5);
            return request()->json(15,$tasks);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {   
      
    }
    public function del($id){
        $todo = Todo::find($id);
        $todo->delete();
        //  if($todo){
        //      $tasks = Todo::orderBy('id','desc')->paginate(5);
        //     return request()->json(15,$tasks);
        // }
    }
}
