<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use DB;
use App\JobCategory;
use App\Todo;
use App\Account;
use App\Event;
use App\Note;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Client::find(2);
        // $todo = Todo::where([['clients_id', '=', $data->id], ['done', '=', '0']])->count();
        // dd($todo);
 
        $client = Client::all();
        $data = [];
        foreach($client as $d) {
            $date = date("d M Y, H.i", strtotime($d->deadline));
            $tt = Todo::where('clients_id', '=', $d->id)->count();
            $td = Todo::where([['clients_id', '=', $d->id], ['done', '=', 1]])->count();
            $percentage = round(($td/$tt) * 100, 2);

            $temp = array("data" => $d, "totalTask" => $tt, "taskDone" => $td, "formatted_date" => $date, "percentage" => $percentage);
            array_push($data, $temp);
        }
        // dd($data);

        return view('client.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->get('deadline');
        $dates = explode("T", $date);        
        $deadline = date("Y-m-d H:i:s", strtotime($dates[0]." ".$dates[1]));
        dd($deadline);
        $client = new Client();
        $client->name = $request->get('name');
        $client->description = $request->get('description');
        $client->email = $request->get('email');
        $client->phone_number = $request->get('phone_number');
        $client->instagram = $request->get('instagram');
        $client->linkedin = $request->get('linkedin');
        $client->status = "in progress";
        $client->deadline = $deadline;
        $client->job_categories_id = "";
        $client->photo_url = $request->get('photo_url');
        // $client->save();
        // return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $tt = Todo::where('clients_id', '=', $client->id)->count();
        $td = Todo::where([['clients_id', '=', $client->id], ['done', '=', 1]])->count();
        $percentage = round(($td/$tt) * 100, 2);
        $data = $client;
        $date = date("d M Y, H.i", strtotime($client->deadline));
        $todos = Todo::where('clients_id', '=', $client->id)->get();

        $accounts = [];
        foreach($todos as $d) {
            $account = $d->accounts;
            foreach($account as $a) {
                array_push($accounts, $a->username);
            }
        }
        $accounts = array_unique($accounts);
        $accountss = [];
        foreach($accounts as $a)
            array_push($accountss, Account::where('username', '=', $a)->get());

        $events = Event::where('clients_id', '=', $data->id)->get();

        $notes = DB::table('notes as n')->join('clients as c', 'n.clients_id', '=', 'c.id')->where([['accounts_username', '=', 'admin'], ['clients_id', '=', $data->id]])->select('n.*', 'c.name')->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }

        // dd($private);
        // dd($events);

        return view('client.detail', compact('data', 'date', 'tt', 'td', 'percentage', 'accountss', 'events', 'todos', 'public', 'private'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function searchClient(Request $request)
    {
        $client = Client::where('name', 'like', "%".$request->inpsearchclient."%")->get();
        $data = [];
        foreach($client as $d) {
            $date = date("d M Y, H.i", strtotime($d->deadline));
            $tt = Todo::where('clients_id', '=', $d->id)->count();
            $td = Todo::where([['clients_id', '=', $d->id], ['done', '=', 1]])->count();
            $percentage = round(($td/$tt) * 100, 2);

            $temp = array("data" => $d, "totalTask" => $tt, "taskDone" => $td, "formatted_date" => $date, "percentage" => $percentage);
            array_push($data, $temp);
        }
        // dd($data);

        return view('client.index', compact('data'));
    }
}
