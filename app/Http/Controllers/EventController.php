<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use DB;
use App\Client;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('events as e')->join('clients as c', 'e.clients_id', '=', 'c.id')->select('e.*', 'c.name as client_name', 'c.photo_url')->get();
        return view('event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('event.add', compact('client'));
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
            'title' => 'required',
            'date' => 'required',
            'clients_id' => 'required',
        ]);

        $data = new Event();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->date = date("Y-m-d H:i:s",strtotime($request->date));
        $data->clients_id = $request->clients_id;
        $data->save();

        return response()->json(['success'=>'Successfully added new event']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $data = $event;
        $client = $data->client;
        return view('event.detail', compact('data', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data = $event;
        $client = Client::all();
        return view('event.edit', compact('data', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'eventid' => 'required',
            'title' => 'required',
            'date' => 'required',
            'clients_id' => 'required',
        ]);

        $event = Event::find($request->get('eventid'));
        $event->title = $request->get('title');
        $event->description = $request->get('description');
        $event->date = date("Y-m-d H:i:s",strtotime($request->get('date')));
        $event->clients_id = $request->get('clients_id');
        $event->save();
        
        return response()->json(['success'=>"Successfully edited event"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // dd($event);
        try{
            $event->delete();
            return redirect()->route('events.index')->with('status',
            'Successfully deleted event!');
        }
        catch(\PDOException $e)
        {
            $msg = 'Failed to delete event!'. $e;
            return redirect()->route('events.index')->with('error', $msg);
        }
    }

    public function searchEvent(Request $request)
    {
        $data = DB::table('events as e')
            ->join('clients as c', 'e.clients_id', '=', 'c.id')
            ->select('e.*', 'c.name as client_name', 'c.photo_url')
            ->where('e.title', 'like', "%".$request->search."%")
            ->get();
        
        $elements = "";
        foreach($data as $e){
            $elements .= '<a href="/events/'.$e->id.'"><div class="dashboard-list-item d-flex"><div class="d-flex">'.($e->clients_id != 1 ? '<img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">' : '').'<div class="ml-10x"><p class="dashboard-item-header">'.$e->title.'</p>'.($e->clients_id != 1 ? '<p class="font-12x">'.$e->client_name.'</p>' : '').'</div></div><p class="font-12x text-align-right">Due '.$e->date.'</p></div></a><div class="divider"></div>';
        }

        return response()->json(['success'=>'Successfully searched events', 'elements'=>$elements]);
    }
}
