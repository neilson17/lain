<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\Todo;
use App\Event;
use App\Transaction;
use App\Client;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = Client::where('id', '<>', 1)->orderBy('deadline')->limit(5)->get();
        $clients = [];
        foreach($client as $d) {
            $date = date("d M Y, H.i", strtotime($d->deadline));
            $tt = Todo::where('clients_id', '=', $d->id)->count();
            $td = Todo::where([['clients_id', '=', $d->id], ['done', '=', 1]])->count();
            $percentage = ($tt != 0) ? round(($td/$tt), 2) : 0;

            $temp = array("data" => $d, "totalTask" => $tt, "taskDone" => $td, "formatted_date" => $date, "percentage" => $percentage);
            array_push($clients, $temp);
        }

        $todos = DB::table('todos as t')->join('account_todo as at', 'at.todo_id', '=', 't.id')
            ->join('clients as c', 't.clients_id', '=', 'c.id')
            ->where([['t.done', 0], ['at.user_id', Auth::id()]])
            ->select('t.*', 'c.name as client_name', 'c.photo_url')
            ->orderBy('t.deadline')
            ->limit(5)
            ->get();

        $events = null;
        $events1 = Event::where('date', '>=', DB::raw('curdate()'))->orderBy('date')->limit(5)->get();
        if ($events1->count() < 5){
            $rest = 5 - $events1->count();
            $events2 = Event::where('date', '<', DB::raw('curdate()'))->orderBy('date')->limit($rest)->get();
            $events = $events1->merge($events2);
        }
        else{
            $events = $events1;
        }

        $trans = Transaction::orderBy('date', 'desc')->limit(5)->get();

        return view('dashboard.index', compact('clients', 'todos', 'events', 'trans'));
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
        //
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
