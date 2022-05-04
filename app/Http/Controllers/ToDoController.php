<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Client;
use App\Tag;
use App\Account;
use DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('todos as t')->join('clients as c', 't.clients_id', '=', 'c.id')->select('t.*', 'c.id as client_id', 'c.name as client_name')->get();
        return view('todo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        $account = Account::all();
        $tag = Tag::all();
        return view('todo.add', compact('client', 'account', 'tag'));
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
            'name' => 'required',
            'deadline' => 'required',
            'clients_id' => 'required',
        ]);

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->deadline = date("Y-m-d H:i:s",strtotime($request->deadline));
        $todo->done = 0;
        $todo->clients_id = $request->clients_id;
        $todo->save();
        $taglist = Tag::find($request->tag);
        $todo->tags()->attach($taglist);
        $usernamelist = Account::find($request->assign);
        $todo->accounts()->attach($usernamelist);
        
        return response()->json(['success'=>'Successfully added new todo']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        $data = $todo;
        $client = $data->client;
        $tag = $data->tags;
        $account = $data->accounts;
        $date = date("d M Y, H.i", strtotime($data->deadline));
        return view('todo.detail', compact('data', 'date', 'client', 'tag', 'account'));
        // dd($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }

    public function showTodo() {
        $todo = Todo::all();
        dd($todo);
    }

    public function searchTodo(Request $request){
        $data = DB::table('todos as t')
            ->join('clients as c', 't.clients_id', '=', 'c.id')
            ->select('t.*', 'c.id as client_id', 'c.name as client_name')
            ->where('t.name', 'like', "%".$request->inpsearchtodo."%")
            ->get();
        return view('todo.index', compact('data'));
    }

    public function changeDone(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->done = $request->done;
        $todo->save();
        
        return response()->json(['success'=>'Successfully updated new todo']);
    }
}
