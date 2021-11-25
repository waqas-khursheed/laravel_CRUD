<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todo;

class TodoController extends Controller
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
        return view('todo_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new todo();
        $res->name = $request->input('name');
        $res->save();

        $request->session()->flash('msg', 'data submited');
       // return redirect('todo_show');
       return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('todo_show')->with('todoArr', todo::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
        return view('todo_edit')->with('todoArr', todo::find($id));
        }
    
    /*
    public function edit(Request $request){
        $id = $request->id;
        $todoArr = todo::find($id);
        return view('todo_edit', compact('todoArr'));
        
    }
    */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = todo::find($request->id);
        $res->name = $request->input('name');
        $res->save();

        $request->session()->flash('msg', 'record Updated');
        //return redirect('todo_show');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        todo::destroy(array('id', $id));
       // return redirect('todo_show');
       return redirect('home'); 
       //return response()->json('Record deleted Successfully');

    }
}
