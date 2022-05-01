<?php

namespace App\Http\Controllers;

use App\Date;
use Illuminate\Http\Request;
use DB;
use App\Client;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dates as d')->join('clients as c', 'd.clients_id', '=', 'c.id')->select('d.*', 'c.name as client_name', 'c.photo_url')->get();
        return view('date.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('date.add', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new Date();
        $date = $request->get('date');
        $dates = explode("T", $date);        
        $date = date("Y-m-d H:i:s", strtotime($dates[0]." ".$dates[1]));
        $data = new Date();
        $data->title = $request->get('title');
        $data->description = $request->get('description');
        $data->date = $date;
        $data->clients_id = $request->get('clients_id');
        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        //
    }
}
