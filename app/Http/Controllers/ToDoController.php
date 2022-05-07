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
        $data = DB::table('todos as t')
            ->join('clients as c', 't.clients_id', '=', 'c.id')
            ->select('t.*', 'c.id as client_id', 'c.name as client_name')
            ->orderBy('t.deadline')
            ->get();
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
        // $taglist = Tag::find($request->tag);
        $todo->tags()->attach($request->tag);
        // $usernamelist = Account::find($request->assign);
        $todo->accounts()->attach($request->assign);
        
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
        $data = $todo;
        $client = Client::all();

        $accountAdded = DB::table('accounts as a')
            ->join('account_todo as at', 'a.username', '=', 'at.account_username')
            ->where('at.todo_id', '=', $todo->id)
            ->get();
        $usernameAdded = [];
        foreach($accountAdded as $acc) array_push($usernameAdded, $acc->username);
        $accountNotAdded = DB::table('accounts as a')
            ->whereNotIn('a.username', $usernameAdded)
            ->get();

        $tagAdded = DB::table('tags as t')
            ->join('tag_todo as tt', 't.id', '=', 'tt.tag_id')
            ->where('tt.todo_id', '=', $todo->id)
            ->get();
        $tagidAdded = [];
        foreach($tagAdded as $tag) array_push($tagidAdded, $tag->id);
        $tagNotAdded = DB::table('tags as t')
            ->whereNotIn('t.id', $tagidAdded)
            ->get();

        return view('todo.edit', compact('data', 'client', 'accountAdded', 'accountNotAdded', 'tagAdded', 'tagNotAdded'));
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
        $request->validate([
            'todoid' => 'required',
            'name' => 'required',
            'deadline' => 'required',
            'clients_id' => 'required',
        ]);

        $todo = Todo::find($request->get('todoid'));
        $todo->name = $request->get('name');
        $todo->description = $request->get('description');
        $todo->deadline = date("Y-m-d H:i:s",strtotime($request->get('deadline')));
        $todo->clients_id = $request->get('clients_id');
        $todo->save();
        $todo->tags()->sync($request->tag);
        $todo->accounts()->sync($request->assign);
        
        return response()->json(['success'=>"Successfully edited todo"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        try{
            $todo->tags()->detach();
            $todo->accounts()->detach();
            $todo->delete();
            return redirect()->route('todos.index')->with('status',
            'Successfully deleted todo!');
        }
        catch(\PDOException $e)
        {
            $msg = 'Failed to delete todo!'. $e;
            return redirect()->route('todos.index')->with('error', $msg);
        }
    }

    public function showTodo() {
        $todo = Todo::all();
        dd($todo);
    }

    public function searchTodo(Request $request){
        $data = DB::table('todos as t')
            ->join('clients as c', 't.clients_id', '=', 'c.id')
            ->select('t.*', 'c.id as client_id', 'c.name as client_name')
            ->where('t.name', 'like', "%".$request->search."%")
            ->get();

        $elements = "";
        foreach($data as $t){
            $elements .= '<a href="/todos/'.$t->id.'"><div class="dashboard-list-item d-flex"><div class="d-flex item-align-center w-70p"><input id="'.$t->id.'" class="done-todo-list" type="checkbox" '.($t->done == 1 ? 'checked' : '').' ><div class="ml-10x"><p class="dashboard-item-header">'.$t->name.'</p>'.($t->client_id != 1 ? '<p class="font-12x">'.$t->client_name .'</p>' : '').'</div></div><div class="w-30p"><p class="font-12x text-align-right">Due '.$t->deadline.'</p></div></div></a><div class="divider"></div>';
        }

        return response()->json(['success'=>'Successfully searched todos', 'elements'=>$elements]);
    }

    public function changeDone(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->done = $request->done;
        $todo->save();
        
        return response()->json(['success'=>'Successfully updated new todo']);
    }
}
