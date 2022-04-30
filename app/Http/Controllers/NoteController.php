<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use DB;
use App\Client;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = DB::table('notes as n')->join('clients as c', 'n.clients_id', '=', 'c.id')->where('accounts_username', '=', 'admin')->select('n.*', 'c.name')->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }
        // dd($public);
        return view('note.index', compact('public', 'private'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('note.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $data = new Note();
        $data->title = $request->get('title');
        $data->content = $request->get('content');
        $data->date = $date;
        $data->type = $request->get('type');
        $data->clients_id = $request->get('clients_id');
        $data->accounts_username = "admin";

        // dd($data);
        $data->save();
        
        // coba pake redirect route
        // redirect()->route('suppliers.index');
        return redirect()->route('notes.index')->with('status', 'data baru berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('note.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }

    public function showNote() {
        $notes = DB::table('notes')->where('accounts_username', '=', 'admin')->get();

        $public = $private = [];

        foreach($notes as $n) {
            if ($n->type == "public") array_push($public, $n);
            else array_push($private, $n);
        }

        // $tz = 'Asia/Jakarta';
        // $dt = new DateTime("now", new DateTimeZone($tz));
        // $timestamp = $dt->format('Y-m-d G:i:s');
        // echo "WIB  : $timestamp \n";

        // echo "<pre>";
        // print_r($public);
        // echo "</pre>";

        // $privateNotes = DB::table('notes')
        dd($notes);
        // return view('note.index', compact('public', 'private'));
    }
}
